const outputHasil = document.getElementById("output_hasil");
// const outputNama = document.getElementById("out_nama");
// const outputPassword = document.getElementById("out_password");
// const outputEmail = document.getElementById("out_email");

const khususouts = document.getElementById("khususout");

async function sub() {
  const displayID = document.getElementById("display");
  const rawInput = document.getElementById("raw_nama").value;
  const rawPassword = document.getElementById("raw_password").value;
  const rawEmail = document.getElementById("raw_email").value;
  // displayID.innerText = "Sedang mengirim data...";

  const data_baru = {
    nama: rawInput,
    password: rawPassword,
    email: rawEmail,
  };
  const respons = await fetch("app.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data_baru),
  });

  const hasildata = await respons.json();

  if (hasildata.status === "berhasil") {
    document.getElementById("raw_nama").value = "";
    document.getElementById("raw_password").value = "";
    document.getElementById("raw_email").value = "";
    await tampil();
    khususouts.innerText = "";
  } else {
    khususouts.innerText = hasildata.pesan;
  }
}

async function tampil() {
  const tampil_data = await fetch("add.php");
  const data_tampil = await tampil_data.json();

  let html = `

    <table border="1">
    <tr>
    <th>Username</th>
    <th>Password</th>
    <th>Email</th>
    <th>hapus</th>
    <th>edit</th>
    </tr>
    
    `;
  data_tampil.forEach((ias) => {
    html += `<tr>
                    <td>${ias.Username}</td>
                    <td>${ias.Password}</td>
                    <td>${ias.Email}</td>
                    <td><button onclick="reset_delete(${ias.id})">hapus</button></td>
                    <td><button onclick="reset_update(${ias.id})">Edit</button></td>
                </tr>

                <div class="edit_form" id="form_edit_${ias.id}"  style ="display:none;">
                    <input type="text" placeholder="Nama baru" id="edit_nama_${ias.id}" value="${ias.Username}">
                    <input type="text" placeholder="Password baru" id="edit_password_${ias.id}" value="${ias.Password}">
                    <input type="text" placeholder="Email baru" id="edit_email_${ias.id}" value="${ias.Email}">
                    <button onclick="update(${ias.id})">Update</button>
                    <button onclick="cancel(${ias.id})">Cancel</button>
                </div>


        `;
  });
  html += "</table>";

  outputHasil.innerHTML = html;
}

function cancel(idcancel) {
  const formEdit = document.getElementById(`form_edit_${idcancel}`);
  if (formEdit) {
    formEdit.style.display = "none";
  }
}

async function reset_delete(idapi) {
  const aray_delete = await fetch("delete.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ idapi }),
  });

  const hasil_delete = await aray_delete.json();

  if (hasil_delete.status === "terhapus") {
    await tampil();
  }
}

window.onload = tampil;

async function reset_update(idu) {
  document.querySelectorAll(".edit_form").forEach((formupdatesein) => {
    formupdatesein.style.display = "none";
  });

  const filetertentu = document.getElementById(`form_edit_${idu}`);
  if (filetertentu) {
    filetertentu.style.display = "block";
  }
}

async function update(iduaccept) {
  const newNama = document.getElementById(`edit_nama_${iduaccept}`).value;
  const newPassword = document.getElementById(
    `edit_password_${iduaccept}`,
  ).value;
  const newEmail = document.getElementById(`edit_email_${iduaccept}`).value;

  const array_update_solute = {
    idupdate: iduaccept,
    nama_baru: newNama,
    password_baru: newPassword,
    email_baru: newEmail,
  };

  const kirim_update = await fetch("edit.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(array_update_solute),
  });

  const hasil_update = await kirim_update.json();

  if (hasil_update.status === "sukses") {
    document.getElementById(`edit_nama_${iduaccept}`).value = "";
    document.getElementById(`edit_password_${iduaccept}`).value = "";
    document.getElementById(`edit_email_${iduaccept}`).value = "";
    khususouts.innerText = "";
    document.getElementById(`form_edit_${iduaccept}`).style.display = "none";
    await tampil();
  } else if (hasil_update.status === "gagalcek") {
    khususouts.innerText = hasil_update.pesan;
  }
}
