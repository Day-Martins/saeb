console.log('carregou custom.js');

window.addEventListener('load', addDarkmodeWidget);


function addDarkmodeWidget() {
  // const options = {
  //   bottom: '64px', // default: '32px'
  //   right: 'unset', // default: '32px'
  //   left: '32px', // default: 'unset'
  //   time: '0.5s', // default: '0.3s'
  //   mixColor: '#fff', // default: '#fff'
  //   backgroundColor: '#fff',  // default: '#fff'
  //   buttonColorDark: '#100f2c',  // default: '#100f2c'
  //   buttonColorLight: '#fff', // default: '#fff'
  //   saveInCookies: false, // default: true,
  //   label: '🌓', // default: ''
  //   autoMatchOsTheme: true // default: true
  // }
  var darkmode = new Darkmode();
  
  document.getElementById("contrast-btn").onclick = function(){
    darkmode.toggle();
  }
}
  