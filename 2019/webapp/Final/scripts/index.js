const storyList = document.querySelector('.story')
const storyBook = document.getElementById('storybook')
const loggedOutLinks = document.querySelectorAll(".logged-out")
const loggedInLinks = document.querySelectorAll(".logged-in")
const accountDetails = document.querySelector('.account-details')
const newerDiv = document.getElementById('newerDiv')
const modalStory = document.getElementById("modal-story")
let contentNow = ''

const setupUI = (user) => {
        if (user) {
            //acount info
            const html = `
              <div>เข้าสู่ระบบด้วยชื่อ ${user.email}</div>
              `
            accountDetails.innerHTML = html;

            // toggle
            loggedInLinks.forEach(item => item.style.display = 'block')
            loggedOutLinks.forEach(item => item.style.display = 'none')
        } else {
            // hide account info
            accountDetails.innerHTML = ''

            loggedInLinks.forEach(item => item.style.display = 'none')
            loggedOutLinks.forEach(item => item.style.display = 'block')
        }
    }
    // setup story
const setupGuides = (data) => {
    if (data.length) {
        let html = ''
        storyList.innerHTML = html;
    } else {
        storyList.innerHTML = "<h3 class='center-align'><a href='#' class='modal-trigger' data-target='modal-login'>เข้าสู่ระบบเพื่อเขียนนิยายของคุณ</a></h3>"
    }

}


const storyData = (data, user) => {
    storyBook.innerHTML = ""



    if (data.length) {

        data.forEach(doc => {
            const story = doc.data();
            let html = ''
            var newStory = document.createElement("div")

            const li = `

            <a href="#" class="modal-trigger" data-target="modal-story">
                <img src="${story.image}" class="myImage"></a>
                <h5 class="black white-text" style="margin-top: 0px;">${story.title}</h5>
              `
            html += li

            newStory.classList = "center-align"
            newStory.innerHTML = html
            newStory.addEventListener("click", function() {
                modalStory.innerHTML = `
                
                <div class="modal-content center-align">
                
                <img src="${story.image}" class="myImageSmaller" style="margin-bottom: 15px;">
                <h4  class="blue white-text">${story.title}</h4>
                <p>${story.content}</p>
                <p class="grey white-text">เขียนโดย ${story.user}</p>
                </div>`


            })
            storyBook.appendChild(newStory);

        })

    }
}





// setup materialize components
document.addEventListener('DOMContentLoaded', function() {

    var modals = document.querySelectorAll('.modal');
    M.Modal.init(modals);

    var items = document.querySelectorAll('.collapsible');
    M.Collapsible.init(items);

});