<script type="text/javascript">

$(document).ready(function(){
var url="nerdgawd_get.php";
$.getJSON(url,function(json){
$.each(json,function(i,dat){
$("#ane").append(
'<div class="CharacterList">'+
'<h1>'+dat.id+'</h1>'+
'<p>AgeGroup : <em>'+dat.AgeGroup+'</em>'+
'<p>Geography : <em>'+dat.Geography+'</em>'+
'<p>FavoriteCharacter : <em>'+dat.FavoriteCharacter+'</em>'+
'<p>Source : <em>'+dat.Source+'</em></p>'+
'<p>Genre : <em>'+dat.Genre+'</em></p>'+
'<p>Sign-up : <em>'+dat.Signup+'</em></p>'+
'<hr>'+
'</div>'
);
});
});
});
