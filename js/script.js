document.getElementById('btn-nav-new').addEventListener("click", navigationNew);
document.getElementById('btn-nav-list').addEventListener("click", navigationList);
document.getElementById('btn-cancel').addEventListener("click", navigationHome);
document.getElementById('btn-back-home').addEventListener("click", navigationHome);

function navigationNew() {
    window.location = "new-account.php";
}
function navigationList() {
    window.location = 'list-accounts.php';
}
function navigationHome() {
    window.location = 'menu.php';
}
function backhome() {
    window.location = 'menu.php';
}
function del(){
    document.form1.action = "del.php";
}   
function logout(){
    window.location = 'logout.php';
}