/*
* @Author: Steffen Peschel
* @Date:   2018-09-03 02:41:23
* @Last Modified by:   Steffen Peschel
* @Last Modified time: 2018-09-10 17:30:38
*/

// import Sass file
import "../sass/main-admin.scss";

var openTab = require("./openTab");

if (typeof window.openTab === "undefined") {
    window.openTab = openTab;
}