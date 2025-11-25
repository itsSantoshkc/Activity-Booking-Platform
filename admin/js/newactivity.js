function handleSubmit(event) {
  event.preventDefault();
  console.log(event);
}

function handleImageChange(event) {
  const label = event.target.parentElement;
  const imgElement = label.children[1];
  const imgFile = event.target.files[0];
  const imgIcon = label.children[2];
  if (!imgFile) {
    return;
  }
  imgElement.src = URL.createObjectURL(imgFile);
  if (imgElement.classList.contains("hidden")) {
    imgElement.classList.toggle("hidden");
    imgIcon.classList.toggle("fa-solid");
    imgIcon.classList.toggle("hidden");
    imgIcon.classList.toggle("fa-camera");
  }
}
