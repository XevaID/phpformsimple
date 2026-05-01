async function checkAuthuser() {
  const responseAuth = await fetch(
    "/kode/RedQuiff/api/authusers/checkAuth.php",
  );
  const dataAuth = await responseAuth.json();
  if (dataAuth.status === "success") {
    return;
  } else {
    window.location.href = "/kode/RedQuiff/pages/userin.php";
  }
}

checkAuthuser();

function logout() {
  requestLogout();
}

async function requestLogout() {
  //mengirim paket ke logout.php
  await fetch("/kode/RedQuiff/api/authusers/LogOut.php");
  //menunggu sampai selesai dan menerima balasan
  window.location.href = "/kode/RedQuiff/pages/userin.php";
}
