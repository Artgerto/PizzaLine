function showDropdown(name) {
    if (document.getElementById(name).classList.contains('show')){
        document.getElementById(name).classList.remove('show');
    } else  document.getElementById(name).classList.add('show');
}
