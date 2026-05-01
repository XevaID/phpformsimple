const outtext = document.getElementById("outputtext");

function toRegister() {
  document.getElementById("loginForm").style.display = "none";
  document.getElementById("registerForm").style.display = "flex";
}

function toLogin() {
  document.getElementById("registerForm").style.display = "none";
  document.getElementById("loginForm").style.display = "flex";
}

async function login() {
  const datainputusername = document.getElementById("inputusername").value;
  const datainputpassword = document.getElementById("inputpassword").value;

  const datainrow = {
    usernamein: datainputusername,
    passwordin: datainputpassword,
  };

  const optionsresponse = await fetch(
    "/kode/RedQuiff/api/authusers/Authuserslogin.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(datainrow),
    },
  );
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
