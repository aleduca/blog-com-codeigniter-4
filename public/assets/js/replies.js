const btnReplies = document.querySelectorAll(".btn-reply");
const btnSendReply = document.querySelector("#btn-send-reply");
const modal = new bootstrap.Modal(document.getElementById("modal-comment"));
const modalTitle = document.querySelector(".modal-title");

btnReplies.forEach((btn) => {
  btn.addEventListener("click", function () {
    modalTitle.textContent = this.textContent;

    btnSendReply.setAttribute("data-id", this.getAttribute("data-id"));

    modal.show();
  });
});

btnSendReply.addEventListener("click", async function () {
  const commentId = this.getAttribute("data-id");
  const reply = document.querySelector("#modal-comment-text");
  if (!reply.value.length) {
    alert("Digite uma resposta");
    return;
  }
  this.textContent = "Enviando resposta, aguarde...";
  try {
    const data = await fetch("/api/reply", {
      method: "post",
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
      body: JSON.stringify({
        commentId,
        reply: reply.value,
      }),
    });

    const response = await data.json();

    if (response.message === "replied") {
      alert("Resposta cadastrada com sucesso");
      this.innerHTML = "Send Reply <i class='bi bi-check'>";
      reply.value = "";
    }

    setTimeout(() => {
      modal.hide();
    }, 1000);

    console.log(response);
  } catch (error) {
    console.log(error);
  }
});
