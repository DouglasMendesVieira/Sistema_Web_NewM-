function Validar() {
  var nome = formuser.nome.value;
  var data_nascimento = formuser.data_nascimento.value;
  var cpf = formuser.cpf.value;
  var celular = formuser.celular.value;
  var email = formuser.email.value;
  var endereco = formuser.endereco.value;
  var observacao = formuser.observacao.value;
  let re = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;

  if (nome == "") {
    alert("Preencha o campo nome!");
    formuser.nome.focus();
    return false;
  }

  if (data_nascimento == "") {
    alert("Preencha o campo data de nascimento!");
    formuser.data_nascimento.focus();
    return false;
  }

  if (cpf == "") {
    alert("Preencha o campo cpf!");
    return false;
  }

  if (celular == "") {
    alert("Preencha o campo celular!");
    formuser.celular.focus();
    return false;
  }

  if (email == "") {
    alert("Preencha o campo email!");
    formuser.email.focus();
    return false;
  }

  if (endereco == "") {
    alert("Preencha o campo endereço!");
    formuser.endereco.focus();
    return false;
  }

  if (!re.test(nome)) {
    alert("O campo nome aceita somente letras com ou sem acento.");
    formuser.nome.focus();
    return false;
  }

  if (observacao.length > 300) {
    alert("O campo observação não pode ter mais de 300 caracteres!");
    formuser.endereco.focus();
    return false;
  }
}
