/**
* 会社概要専用スクリプト
*/
const borderPcMobile = 750;
const showGoTopBtn = 800;

document.addEventListener("DOMContentLoaded", function(event) { //DOMを読み込み終わってから実行
  var app = new Vue({
    el: "#header",
    data: {
      width: 0,
      height: 0,
      smMenuActive: false,
    },
    methods: {
      triggerSmMenu() {
        if (this.smMenuActive) {
          this.smMenuActive = false;
        } else {
          this.smMenuActive = true;
          this.isShowGoBackBtn = false;
        }
      },
      handleResize() {
        this.width = window.innerWidth;
        this.height = window.innerHeight;
      },
      handleScroll() {
      },
    },
    computed: {
      isPc() {
        return this.width > borderPcMobile;
      }
    },
    mounted: function () {
      this.handleResize();
      window.addEventListener('resize', this.handleResize);
      window.addEventListener('scroll', this.handleScroll);
    },
  });
});