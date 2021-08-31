"use strict";

document.addEventListener('DOMContentLoaded', function(){
  const form = document.getElementById('form');
  form.addEventListener('submit', formSend);

  async function formSend(e){
    e.preventDefault();

    let error = formValidate(form);

    if(error===0){
      reciveFormValue(event);
      form.reset();
    }
    else{
      alert('Заполните обязательные поля');
    }
  }

  function reciveFormValue(event){
    event.preventDefault();

    let name = document.querySelector('.name'),
      address = document.querySelector('.address'),
      phone = document.querySelector('.phone'),
      email = document.querySelector('.email');

      const values = {
        name: name.value,
        address: address.value,
        phone: phone.value,
        email: email.value
      };
      showFormValue(values);
  }

  function showFormValue(values){
    if (!isEmpty(values)){
      $('.info').html('');
    }
    else{
    let out='';
    out +=`<table class="info-table">`;
    out +=`<caption class="info-caption">Ваши данные</caption>`;
    out +=`<tbody class="info-tbody">`;
    out +=`<tr class="info-tr">`;
    out +=`<th class="info-th">ФИО:</th>`;
    out +=`</tr>`;
    out +=`<tr class="info-tr-value">`;
    out +=`<td class="info-td">${values.name}</td>`;
    out +=`</tr>`;
    out +=`<tr class="info-tr">`;
    out +=`<th class="info-th">Адрес:</th>`;
    out +=`</tr>`;
    out +=`<tr class="info-tr-value">`;
    out +=`<td class="info-td">${values.address}</td>`;
    out +=`</tr>`;
    out +=`<tr class="info-tr">`;
    out +=`<th class="info-th">Номер:</th>`;
    out +=`</tr>`;
    out +=`<tr class="info-tr-value">`;
    out +=`<td class="info-td">${values.phone}</td>`;
    out +=`</tr>`;
    out +=`<tr class="info-tr">`;
    out +=`<th class="info-th">Email:</th>`;
    out +=`</tr>`;
    out +=`<tr class="info-tr-value">`;
    out +=`<td class="info-td">${values.email}</td>`;
    out +=`</tr>`;
    out +=`</tbody>`;
    out +=`</table>`;
    $('.info').html(out);
    }
  }

  function isEmpty(object){
    for(var key in object)
    if (object.hasOwnProperty(key)) return true;
    return false;
  }

  function formValidate(form){
    let error = 0;
    let formReq = document.querySelectorAll('.req');

    for (let index = 0; index < formReq.length; index++) {
      const input = formReq[index];
      formRemoveError(input);

      if (input.classList.contains('email')){
        if (emailTest(input)){
          formAddError(input);
          error++;
          console.log("Ошибка");
        }
      }
      else if (input.classList.contains('phone')){
        if (phoneTest(input)){
          formAddError(input);
          error++;
          console.log("Ошибка");
        }

      }
      else{
        if (input.value===''){
          formAddError(input);
          error++;
          console.log("Ошибка");
        }
      }
    }
    return error;
  }

  function formAddError(input) {
    input.parentElement.classList.add('error');
    input.classList.add('error');
  }

  function formRemoveError(input) {
    input.parentElement.classList.remove('error');
    input.classList.remove('error');
  }

  function emailTest(input){
    return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(input.value);
  }

  function phoneTest(input){
    return !/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g.test(input.value);
  }

});
