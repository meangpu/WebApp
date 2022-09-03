var divName = "main-container";
var mainSelectDiv = document.getElementById(divName);
const mainDataName = "/webdata.json";

function addToMainDiv(childContent) {
  mainSelectDiv.appendChild(childContent);
}

function createTextNodeToParent(word, parent) {
  let nowText = document.createTextNode(word);
  parent.appendChild(nowText);
}

function createDivByContent(content) {
  let newDiv = document.createElement("a");
  newDiv.classList.add("portfolio__item");
  // if have src on div
  content.src && newDiv.setAttribute("href", content.src);

  content.img && createImgDiv(content.img);
  content.code && createCodeTitle(content.code);
  content.title && createTitle(content.title);

  addToMainDiv(newDiv);

  function createCodeTitle(codeName) {
    let codeNameItem = document.createElement("h2");
    createTextNodeToParent(codeName, codeNameItem);
    newDiv.appendChild(codeNameItem);
  }

  function createImgDiv(imgSrc) {
    let divImgHolder = document.createElement("div");
    divImgHolder.classList.add("portfolio__item-img");

    let newImg = document.createElement("img");
    newImg.setAttribute("src", imgSrc);
    divImgHolder.appendChild(newImg);
    newDiv.appendChild(divImgHolder);
  }

  function createTitle(nowTitle) {
    let titleName = document.createElement("h3");
    createTextNodeToParent(nowTitle, titleName);
    newDiv.appendChild(titleName);
  }
}
function createDivByContentWith_webappID(content, id) {
  /** start format
   *  "src": "/2019-webapp/Lab",
      "img": "/2019-webapp/img/",
      "code": "lab",
      "loop": 9
   */
  let newDiv = document.createElement("a");
  newDiv.classList.add("portfolio__item");
  // if have src on div
  // console.log(`${content.src}${id}`);
  content.src && newDiv.setAttribute("href", `${content.src}${id}`);
  content.img && createImgDiv(`${content.img}${id}.webp`);
  content.code && createCodeTitle(`${content.code}${id}`);
  content.title && createTitle(content.title);

  addToMainDiv(newDiv);

  function createCodeTitle(codeName) {
    let codeNameItem = document.createElement("h2");
    createTextNodeToParent(codeName, codeNameItem);
    newDiv.appendChild(codeNameItem);
  }

  function createImgDiv(imgSrc) {
    let divImgHolder = document.createElement("div");
    divImgHolder.classList.add("portfolio__item-img");

    let newImg = document.createElement("img");
    newImg.setAttribute("src", imgSrc);
    divImgHolder.appendChild(newImg);
    newDiv.appendChild(divImgHolder);
  }

  function createTitle(nowTitle) {
    let titleName = document.createElement("h3");
    createTextNodeToParent(nowTitle, titleName);
    newDiv.appendChild(titleName);
  }
}
function loopCallData(objJson) {
  for (var i = 0; i < objJson.length; i++) {
    var nowObj = objJson[i];
    createDivByContent(nowObj);
    // console.log(nowObj);
  }
}

function getDataFromCatalogName(callCatalog, filename = mainDataName) {
  return new Promise((resolve, reject) => {
    fetch(filename)
      .then((respond) => respond.json())
      .then((data) => {
        resolve(data[callCatalog]);
      });
  });
}

// export use in another scpt

export async function setHomePageData() {
  getDataFromCatalogName("homepage").then((homeData) => loopCallData(homeData));
}

function WebpageLoopInsideFirstElement(labObj) {
  for (let index = 0; index < labObj.loop; index++) {
    createDivByContentWith_webappID(labObj, index + 1);
  }
}
export async function setWebPageData() {
  getDataFromCatalogName("webapp").then((webDataFetch) => {
    WebpageLoopInsideFirstElement(webDataFetch[0]),
      createDivByContent(webDataFetch[1]);
  });
}

export async function setUnityWebData() {
  getDataFromCatalogName("unity").then((unityData) =>
    WebpageLoopInsideFirstElement(unityData[0])
  );
}

export async function setLab3() {
  getDataFromCatalogName("unitylab3").then((lab3Data) =>
    loopCallData(lab3Data)
  );
}
