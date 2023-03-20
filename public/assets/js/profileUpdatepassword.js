const formUpdatePassword = document.querySelector("#form-update-password");
const btnUpdatePassword = document.querySelector("#btn-update-password");
formUpdatePassword.addEventListener("submit", async (event) => {
  event.preventDefault();
  btnUpdatePassword.textContent = "Aguarde, atualizando.";

  const formData = new FormData(formUpdatePassword);

  try {
    const response = await fetch("/api/password", {
      method: "put",
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": formData.get("csrf_test_name"),
      },
      body: JSON.stringify({
        id: formData.get("id"),
        password: formData.get("password"),
        newPassword: formData.get("newPassword"),
        confirmNewPassword: formData.get("confirmNewPassword"),
      }),
    });

    if (!response.ok) {
      throw await response.json();
    }

    const updated = await response.json();

    if (updated?.message) {
      Swal.fire("Atualizado", updated.message, "success");
    } else {
      Swal.fire(
        "Atenção",
        "Ocorreu um erro ao fazer o update, tente novamente em alguns minutos",
        "error"
      );
    }

    btnUpdatePassword.textContent = "Update";
  } catch (error) {
    console.log("error", error);
    if (error?.validate) {
      for (const key in error.validate) {
        const spanMessage = document.querySelector(`#error-${key}`);
        spanMessage.setAttribute("class", "text text-danger fs-5");
        spanMessage.innerHTML = error.validate[key];

        setTimeout(() => {
          spanMessage.innerHTML = "";
        }, 5000);
      }
    }

    if (error?.message) {
      Swal.fire("Atenção", error.message, "error");
    }

    if (error?.error) {
      Swal.fire("Atenção", error.error, "error");
    }
    btnUpdatePassword.textContent = "Update";
  }
});
