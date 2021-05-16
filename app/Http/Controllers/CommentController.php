<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\userDemo;
class CommentController extends Controller
{
    public function AddAjaxComment($id, $id_User, $comment){
       // $comment = Comment::All();
     //  echo $id;
     $New_comment = new Comment ;
     $New_comment->idUser = $id_User;
     $New_comment->idTinTuc = $id;
     $New_comment->NoiDung = $comment;
     $New_comment->save();


     // result all comment where id table tintuc = $id
    // $result = Comment::where('idTinTuc', $id)->sortByDesc('created_at');
    $result = Comment::orderBy('created_at', 'desc')->where('idTinTuc', $id)->paginate(5);

     foreach($result as $key){
          $user =  $key->userFunction->name;
          $image = $key->userFunction->image;
        echo '  <div  class="p-3 bg-white mt-2 rounded">
          <div  class="d-flex justify-content-between">
              <div class="d-flex flex-row user"><img class="rounded-circle img-fluid img-responsive" src="'.asset("imgUser/".$image).'" width="55">
                  <div class="d-flex flex-column ml-2"><span class="font-weight-bold">'.$user.'</span><span class="day">'.$key->created_at.'</span></div>
              </div>

          </div>
          <div class="comment-text text-justify mt-2">
              <p>'.$key->NoiDung.'</p>
          </div>

      </div> ' ;
     }

    }
}

