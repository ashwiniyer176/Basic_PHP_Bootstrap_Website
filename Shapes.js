function makeShape() {
  var row = document.createElement("tr");

  var td1 = document.createElement("th");
  var td2 = document.createElement("th");
  var td3 = document.createElement("th");

  td1.innerHTML = "Shape";
  td2.innerHTML = "Number of sides";
  td3.innerHTML = "Details";

  row.appendChild(td1);
  row.appendChild(td2);
  row.appendChild(td3);

  document.getElementById("Register1").appendChild(row);

  row = document.createElement("tr");
  td1 = document.createElement("th");
  td2 = document.createElement("th");
  td3 = document.createElement("th");

  td1.innerHTML = "Shape";
  td2.innerHTML = "Number of sides";
  td3.innerHTML = "Details";

  row.appendChild(td1);
  row.appendChild(td2);
  row.appendChild(td3);

  document.getElementById("Register2").appendChild(row);

  for (var numberOfSides = 3; numberOfSides < 13; numberOfSides++) {
    row = document.createElement("tr");

    td1 = document.createElement("td");
    td2 = document.createElement("td");
    td3 = document.createElement("td");

    var canvas = document.createElement("canvas");
    canvas.setAttribute("id", `$numberOfSides sides`);
    canvas.setAttribute("height", "90");
    canvas.setAttribute("width", "90");

    var ctx = canvas.getContext("2d");
    var radius = 45;
    var x = 45;
    var y = 45;
    var angle = (2 * Math.PI) / numberOfSides;
    ctx.lineWidth = 2;
    ctx.beginPath();
    ctx.moveTo(x + radius * Math.cos(0), y + radius * Math.sin(0));
    for (var i = 1; i <= numberOfSides; i++) {
      ctx.lineTo(
        x + radius * Math.cos(i * angle),
        y + radius * Math.sin(i * angle)
      );
    }
    ctx.strokeStyle = "black";
    ctx.stroke();

    td1.appendChild(canvas);
    td2.innerHTML = `${numberOfSides}`;
    td3.innerHTML = `This is a regular Polygon of ${numberOfSides} sides.`;

    row.appendChild(td1);
    row.appendChild(td2);
    row.appendChild(td3);

    if (numberOfSides % 2 === 1) {
      document.getElementById("Register1").appendChild(row);
      // console.log(numberOfSides);
    } else {
      document.getElementById("Register2").appendChild(row);
    }
  }
}
