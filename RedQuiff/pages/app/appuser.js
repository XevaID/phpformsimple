// untuk hasil array pesan atau status di json
const outtext = document.getElementById("outputtext");

function toRegister() {
  // mengubah form login menjadi tak terlihat
  document.getElementById("loginForm").style.display = "none";
  //mengubah form register menjadi terlihat
  document.getElementById("registerForm").style.display = "flex";
}

function toLogin() {
  //mengubah form register menjadi tak terlihat
  document.getElementById("registerForm").style.display = "none";
  //mengubah form login menjadi terlihat
  document.getElementById("loginForm").style.display = "flex";
}

async function login() {
  //mengambil data input WAJIB menggunakan .value
  const datainputusername = document.getElementById("inputusername").value;
  const datainputpassword = document.getElementById("inputpassword").value;
  //membuat array dari value input menjadi variabel yg siap dipakai
  const datainrow = {
    usernamein: datainputusername,
    passwordin: datainputpassword,
  };

  //mengirim paket input ke Authuserslogin

  const optionsresponse = await fetch(
    "/kode/RedQuiff/api/authusers/Authuserslogin.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      //diencode dalam bentuk JSON
      body: JSON.stringify(datainrow),
    },
  );

  //menunggu data selesai diolah kemudian nilainya di decode dalam bentuk JSON
  const dataresponse = await optionsresponse.json();
  outtext.textContent = dataresponse.message;

  if (dataresponse.status === "success") {
    window.location.href = "/kode/RedQuiff/index.php";
  }
}

async function register() {
  const datainputusernameforreg = document.getElementById("regUsername").value;
  const datainputemailforreg = document.getElementById("regEmail").value;
  const datainputpasswordforreg = document.getElementById("regPassword").value;
  const datainputconfirmpasswordforreg =
    document.getElementById("confirmregPassword").value;

  const regRawDataInput = {
    regusername: datainputusernameforreg,
    regemail: datainputemailforreg,
    regpassword: datainputpasswordforreg,
    confirmregpassword: datainputconfirmpasswordforreg,
  };

  const sendregrequest = await fetch(
    "/kode/RedQuiff/api/authusers/Authusersregister.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(regRawDataInput),
    },
  );

  const dataregresponse = await sendregrequest.json();
  outtext.textContent = dataregresponse.message;
  if (dataregresponse.status === "successCreate") {
    window.location.href = "/kode/RedQuiff/index.php";
  }
}

//function untuk cek apakah user memiliki SESSION atau tidak

async function checkAuthuserlogandregis() {
  const responseAuthlogreg = await fetch(
    "/kode/RedQuiff/api/authusers/checkAuth.php",
  );
  const dataAuthlogreg = await responseAuthlogreg.json();
  if (dataAuthlogreg.status === "success") {
    window.location.href = "/kode/RedQuiff/index.php";
  } else {
    return;
  }
}

checkAuthuserlogandregis();
