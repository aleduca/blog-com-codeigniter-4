const avatarImage = document.querySelector("#avatar-image");
const btnChangeAvatar = document.querySelector("#btn-change-avatar");
const formUpdateAvatar = document.querySelector("#form-update-avatar");

avatarImage.addEventListener("change", (event) => {
  const reader = new FileReader();
  reader.onload = function (event) {
    const previewImage = document.querySelector("#preview-image");
    previewImage.width = 150;
    previewImage.height = 100;
    previewImage.style = "border:solid 1px #333;margin-bottom:5px";
    previewImage.src = event.target.result;
  };
  reader.readAsDataURL(avatarImage.files[0]);
  btnChangeAvatar.disabled = false;

  btnChangeAvatar.addEventListener("click", async (event) => {
    try {
      event.preventDefault();
      btnChangeAvatar.textContent = "Aguarde, fazendo upload";
      const formData = new FormData(formUpdateAvatar);
      formData.append("file", avatarImage.files[0]);

      const response = await fetch("/api/avatar", {
        method: "post",
        headers: {
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-Token": formData.get("csrf_test_name"),
        },
        body: formData,
      });

      if (!response.ok) {
        throw await response.json();
      }

      const updated = await response.json();

      if (updated?.message) {
        Swal.fire("Atualizado", updated.message, "success");
        setTimeout(() => {
          window.location.reload();
        }, 3000);
      } else {
        Swal.fire(
          "Atenção",
          "Ocorreu um erro ao fazer o update, tente novamente em alguns minutos",
          "error"
        );
      }

      btnChangeAvatar.textContent = "Change Avatar";
    } catch (error) {
      console.log(error);
      if (error?.message) {
        Swal.fire("Atenção", error.message, "error");
      }

      if (error?.error) {
        Swal.fire("Atenção", error.error, "error");
      }

      btnChangeAvatar.textContent = "Change Avatar";
    }
  });
});
