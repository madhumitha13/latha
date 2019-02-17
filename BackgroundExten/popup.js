function hello() {
    chrome.tabs.executeScript({
      file: 'alert.js'
    }); 
  }
  document.getElementById('colorchoose').addEventListener('change', hello);  