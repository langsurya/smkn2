<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Siswa;

class siswaController extends Controller
{
    public function index(){
      // $siswa = Siswa::all();
      $data = DB::table('siswas')->count();
      $siswa = Siswa::paginate(2);

      return view('siswa.home', compact('siswa'), ['data'=>$data]);
    }

    public function show($id){
      // dd($request);
      // $siswa = Siswa::where('nomor_ijazah',$id);
      // $siswa = Siswa::where('nomor_ijazah',$id)->get();
      // dd($siswa);

      return view('siswa.show', ['siswa'=>$siswa]);
    }
}
