async function checkAuthuser() {
  // /kode/RedQuiff/api/authusers/checkAuth.php
  const responseAuth = await fetch("api/authusers/checkAuth.php");
  const dataAuth = await responseAuth.json();
  if (dataAuth.status === "success") {
    return;
  } else {
    window.location.href = "pages/userin.php";
    // /kode/RedQuiff/pages/userin.php
  }
}

checkAuthuser();

function logout() {
  requestLogout();
}

async function requestLogout() {
  //mengirim paket ke logout.php /kode/RedQuiff/api/authusers/LogOut.php
  await fetch("api/authusers/LogOut.php");
  //menunggu sampai selesai dan menerima balasan /kode/RedQuiff/pages/userin.php
  window.location.href = "pages/userin.php";
}
