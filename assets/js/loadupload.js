   var selDiv = "";
var storedFiles = [];
$("#files").on("change", handleFileSelect);
    selDiv = $("#selectedFiles"); 
    $("body").on("click",   ".selFile", removeFile);

function handleFileSelect(e) {
  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);
    filesArr.forEach(function(f) {          
      if(!f.type.match("image.*")) {
          return;
      }
        storedFiles.push(f);
        var reader = new FileReader();
      reader.onload = function (e) {
        var html = "<div style='boder:8px solid black;'><img width='550' height='500' src=\"" + e.target.result + "\" data-file='"+f.name+"' class='selFile' title='Click to remove'/></div>";
          selDiv.append(html);
                
      }
        reader.readAsDataURL(f); 
    });
}
function removeFile(e) {
  var file = $(this).data("file");
    for(var i=0;i<storedFiles.length;i++) {
      if(storedFiles[i].name === file) {
        storedFiles.splice(i,1);
          break;
      }
    }
      $(this).parent().remove();
} 
  $("#UploadPhoto").click(function(e){
  var UploadPhotos;
  var PhotosDescription = document.getElementById("PhotosDescription").value;
  if (PhotosDescription=='') {
    alert('Fill all fields');
  }else{
  var form_data = new FormData();
  form_data.append('UploadPhotos', UploadPhotos);  
  for(var i=0, len=storedFiles.length; i<len; i++) {
  /*  var PhotosDescription = document.getElementById("PhotosDescription").value;*/
   
   
    storedFiles[i] = $('#files').prop('files')[i];  
     form_data.append('PhotosDescription', PhotosDescription);                 
    form_data.append('file', storedFiles[i]);
   
    
    console.log(PhotosDescription); 

    console.log(storedFiles[i]);
                   
    $.ajax({
                url: 'admin-ajax.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'POST',
                success: function(php_script_response){
                 
                }
     });
      }  
    }
});
