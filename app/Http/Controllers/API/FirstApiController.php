<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirstApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->type;
        $stars = $request->star;
        $horizontal = 0;
        $result = "";

        if ($type == 1) {
            for ($i=1; $i <= $stars; $i++) { 
                $horizontal = $i;
                for ($x=1; $x <= $horizontal; $x++) { 
                    if ($x < $horizontal) {
                        $result .= "* ";
                    } else {
                        $result .= "*";
                    }
                }
                $result .= "<br>";
            }
        } elseif ($type == 2) {
            for ($i=$stars; $i > 0; $i--) { 
                $horizontal = $i;
                for ($x=$horizontal; $x > 0; $x--) { 
                    if ($x > 1) {
                        $result .= "* ";
                    } else {
                        $result .= "*";
                    }
                }
                $result .= "<br>";
            }
        } else {
            $space = 0;
            for ($i=1; $i <= $stars; $i++) { 
                $horizontal = $i;
                for ($x=($stars*2); $x > 0; $x--) {
                    if ($x == $horizontal+$space) {
                        for ($n=1; $n <= $horizontal; $n++) { 
                            if($n < $horizontal) {
                                $result .= "* ";
                            } else {
                                $result .= "*";
                            }
                        }
                        break;
                    } else {
                        $result .= "&nbsp;";
                    }
                        
                }
                $result .= "<br>";
                $space += 1;
            }
        }

        return $result;
    }

    public function rupiah(Request $request) {
        $nominal = $request->nominal;
        $output = "Output<br>";
        $formatRupiah = $this->formatRupiah($nominal);
        $output .= $formatRupiah."<br>";
        $terbilang = "Terbilang :<br>";

        $arrayNominal = str_split($nominal);
        $length = strlen($nominal);
        $index = 0;

        for($i=$length-1; $i>=0; $i--) {
            switch($i) {
                case 7:
                    if($arrayNominal[$index] == 1 && $arrayNominal[$index+1] == 0) {
                        $terbilang .= $this->bilangan($arrayNominal[$index], $i)." puluh ";
                        break;
                    } elseif ($arrayNominal[$index] == 1 && $arrayNominal[$index+1] > 0) {
                        break;
                    } else {
                        $terbilang .= $this->bilangan($arrayNominal[$index], $i)." puluh ";
                        break;
                    }
                case 6:
                    if($length > 7) {
                        if($arrayNominal[$index] == 0 && $arrayNominal[$index-1] == 1) {
                            $terbilang .= $this->bilangan($arrayNominal[$index], $i)." juta ";
                            break;
                        } elseif ($arrayNominal[$index] > 0 && $arrayNominal[$index-1] == 1) {
                            $terbilang .= $this->bilangan($arrayNominal[$index], $i)." belas juta ";
                            break;
                        } else {
                            $terbilang .= $this->bilangan($arrayNominal[$index], $i)."  juta ";
                            break;
                        }
                    } else {
                        $terbilang .= $this->bilangan($arrayNominal[$index], $i)." juta ";
                        break;
                    }
                case 5:
                    if($arrayNominal[$index] > 0) {
                        $terbilang .= $this->bilangan($arrayNominal[$index], $i)." ratus ";
                    }
                    break;
                case 4:
                    if($arrayNominal[$index] > 0) {
                        $terbilang .= $this->bilangan($arrayNominal[$index], $i)." puluh ";
                    }
                    break;
                case 3:
                    if($length >= 7) {
                        if($arrayNominal[$index] == 0 && ($arrayNominal[$index-1] > 0 || $arrayNominal[$index-2] > 0)) {
                            $terbilang .= "ribu ";
                            break;
                        } elseif($arrayNominal[$index] > 0) {
                            $terbilang .= $this->bilangan($arrayNominal[$index], $i)." ribu ";
                        }
                    } else {
                        $terbilang .= $this->bilangan($arrayNominal[$index], $i)." ribu ";
                    }
                    break;
                case 2:
                    if($arrayNominal[$index] > 0) {
                        $terbilang .= $this->bilangan($arrayNominal[$index], $i)." ratus ";
                    }
                    break;
                case 1:
                    if($arrayNominal[$index] > 0) {
                        $terbilang .= $this->bilangan($arrayNominal[$index], $i)." puluh ";
                    }
                    break;
                case 0:
                    $terbilang .= $this->bilangan($arrayNominal[$index], $i);
                    break;
                default:
                    break;
            } 
            $index += 1;
        }

        $terbilang .= " rupiah";
        
        $resultArr = array('rupiah' => $output, 'terbilang' => $terbilang);
        $result = json_encode($resultArr);
        return $result;
    }

    function bilangan($angka, $digit) {
        
        if($angka == 1) {
            if($digit == 2 || $digit < 6) {
                $res = "se";
            } elseif ($digit >= 6 && ($digit % 3) == 0) {
                $res = "satu";
            }
        } elseif ($angka == 2) {
            $res = "dua";
        } elseif ($angka == 3) {
            $res = "tiga";
        } elseif ($angka == 4) {
            $res = "empat";
        } elseif ($angka == 5) {
            $res = "lima";
        } elseif ($angka == 6) {
            $res = "enam";
        } elseif ($angka == 7) {
            $res = "tujuh";
        } elseif ($angka == 8) {
            $res = "delapan";
        } elseif ($angka == 9) {
            $res = "sembilan";
        } else {
            $res = "";
        }
        return $res;

    }

    function formatRupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
