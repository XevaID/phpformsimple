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
  await fetch("/kode/RedQuiff/api/authusers/LogOut.php");
  window.location.href = "/kode/RedQuiff/pages/userin.php";
}
