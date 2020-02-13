/**
* 共通Script
*/
const borderPcMobile = 875;
const showGoTopBtn = 800;

document.addEventListener("DOMContentLoaded", function(event) { //DOMを読み込み終わってから実行
  var app = new Vue({
    el: "#header",
    data: {
      width: 0,
      height: 0,
      scrollY: 0,
      smMenuActive: false,
      pcMenuActive: true,
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
        if (this.scrollY > window.scrollY) {
          this.pcMenuActive = true;
        } else {
          this.pcMenuActive = false;
        }
        this.scrollY = window.scrollY;
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