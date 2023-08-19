const display = document.querySelector("#display");
const btns = document.querySelectorAll(".btn");

btns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    let type = e.target.textContent;
    console.log("Clicked: ", e.target.textContent);
    let str = display.textContent;

    switch (type) {
      case "X":
        str += "*";
        break;

      case "x2":
        str += "**";
        break;

      case "Clear":
        str = "0";
        break;

      case "Back":
        let x = str.slice(0, str.length - 1);
        str = x.length < 1 ? 0 : x;
        break;

      case "/":
        str += "/";
        break;

      case "=":
        try {
          str = eval(str);
        } catch (err) {
          alert(err.message);
        }
        break;

      default:
        str = str === "0" ? type : str + type;
    }

    display.textContent = str;
  });
});
