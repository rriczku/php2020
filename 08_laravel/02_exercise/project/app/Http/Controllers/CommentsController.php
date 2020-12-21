<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
class CommentsController extends Controller
{
  function index()
  {
      $data=Comments::all();
      return view('comments',['data'=>$data]);
  }

  function show($id)
  {
      $data=\DB::table('comments')->find($id);
      return "<h1>$data->title</h1><br/><p>$data->text</p>";
  }
}
