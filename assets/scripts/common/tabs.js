import {addClass, removeClass} from "./helpers/ClassHelper";

(function() {
    initTabs();
})();

function initTabs(){
    var tabs = document.getElementsByClassName('tab');

    Array.from(tabs).forEach(tab => tab.addEventListener('click', onClick_tab));
}

function onClick_tab(event) {
    var source = event.currentTarget;

    var activeTab = document.getElementsByClassName('tab active');

    removeClass(activeTab[0], 'active');
    addClass(source, 'active');

    var activeContainer = document.getElementsByClassName('tabContainer active');

    addClass(activeContainer[0], 'hidden');
    removeClass(activeContainer[0], 'active');

    var sourceContainer = document.getElementById(source.dataset.target);

    removeClass(sourceContainer, 'hidden');
    addClass(sourceContainer, 'active');

}

export { initTabs };