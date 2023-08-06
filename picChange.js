//Picture Preview in Profile
function change() {
  let img = document.getElementById("myPic");
  let input = document.getElementById("file");
  // Get the uploaded file in the input and assign as a source to the Img tag
  img.src = URL.createObjectURL(input.files[0]);
}
