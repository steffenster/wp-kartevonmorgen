/*
* @Author: Steffen Peschel
* @Date:   2018-09-10 17:22:32
* @Last Modified by:   Steffen Peschel
* @Last Modified time: 2018-09-10 18:13:50
*/
module.exports = function openTab(evt, tabName) {

    evt.preventDefault();

    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");

    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablink");

    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";

    evt.currentTarget.className += " active";

}