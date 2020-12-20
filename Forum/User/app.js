const MonthMap = {
0: "January",
1: "February",
2: "March",
3: "April",
4: "May",
5: "June",
6: "July",
7: "August",
8: "September",
9: "October",
10: "November",
11: "Devember"
};

const DaysMap = {
0: "Sunday",
1: "Monday",
2: "Tuesday",
3: "Wednesday",
4: "Thursday",
5: "Friday",
6: "Saturday"
};

/*const getRandomImageURL = () => {
const imageURLS = [
  "https://randomuser.me/api/portraits/women/26.jpg"
];
const random = Math.round(Math.random() * imageURLS.length);
return imageURLS[random];
};

const getRandomName = () => {
const names = [
  "Tiffany Palmer"
];
const random = Math.round(Math.random() * names.length);
return names[random];
};

const getRandomOccupation = () => {
const occupations = [
  "HR Operations"
];
const random = Math.round(Math.random() * occupations.length);
return occupations[random];
};

const getRandomCommentText = () => {
const commentText = [
  "Good Text"
];
const random = Math.round(Math.random() * commentText.length);
return commentText[random];
};
*/
const getFormatedDate = (date) => {
const day = date.getDate();
const month = MonthMap[date.getMonth()];
const year = date.getFullYear();
let daySuffix = "th";
switch (day) {
  case (1, 21, 31):
    daySuffix = "st";
    break;
  case (2, 22):
    daySuffix = "nd";
    break;
  case (3, 23):
    daySuffix = "rd";
    break;
}
return `${DaysMap[date.getDay()]} ${day}${daySuffix} ${month}, ${year}`;
};



let nextID = 1;
const comments = generateRandomComment({ count: 1 });

const getNewComment = (comment) => {
const newComment = generateRandomComment({ comment });
//return newComment[nextID - 1];
 return {
     id: nextID++,
     imageURL: "https://newsfeedtemplate.netlify.com/img/user01.jpg",
     imageALT: "Naveen Pantra",
     name: "Naveen Pantra",
     occupation: "Software Engineer",
     formattedDate: "22nd March, 2020",
     comment,
     isOpen: false,
     isEditing: false,
     isCommenting: false,
     comments: [],
 };
};

const DOMSelectors = {
commentSection: ".comments_section"
};

const CONSTANTS = {
CLOSEST_COMMENT_CARD: "div.comment_card[id*=comment]",
COMMENT_EDIT: ".comment_edit",
COMMENT_EDIT_MESSAGE: ".comment_edit_message",
COMMENT_EDIT_TEXTAREA: ".comment_edit_textarea",
COMMENT_TEXT: ".comment_text",
COMMENTS: ".comments",
SHOW_COMMENTS: ".comment_options button:nth-child(3)",
COMMENT_COMENT: ".comment_options button:nth-child(2)",
EDIT_COMMENT: ".comment_options button:nth-child(1)",
SUBMIT_COMMENT: ".comment_edit > div > button:nth-child(1)",
CANCLE_COMMENT: ".comment_edit > div > button:nth-child(2)",
IS_EDITING: "isEditing",
IS_COMMENTING: "isCommenting",
SHOW_ALL: "show_all",
SUBMIT: "submit",
CANCLE: "cancle",

POINTER_EVENTS: "pointer-events",
OPACITY: "opacity",
DISABLE_OPACITY: 0.5,
ENABLE_OPACITY: 1,
COLOR_RED: "var(--color-red)"
};

const TEXT_CONTENT = {
SHOW_COMMENTS: "Show Comments",
HIDE_COMMENTS: "Hide Comments"
};

function getCommentCard(data = {}, depth = 0) {
const {
  imageURL = "https://newsfeedtemplate.netlify.com/img/user01.jpg",
  imageALT = "Naveen Pantra",
  name = "Naveen Pantra",
  occupation = "Software Engineer",
  formattedDate = "22nd March, 2020",
  comment = "Hello this is a test comment.",
  isOpen = false,
  isEditing = false,
  isCommenting = false,
  comments = [],
  id = 0
} = data;
return `
  <div class="comment_card" id="comment-${id}" data-depth="${depth}" style="margin-left: ${
  11 * (depth ? 1 : 0)
}rem;">
      <figure class="figure">
          <img class="image" src="${imageURL}" alt="${imageALT}"/>
          <figcaption class="fig_caption">
              <h5 class="name">${name}</h5>
              <h6 class="occupation">${occupation}</h6>
              <p class="date">${formattedDate}</p>
          </figcaption>
      </figure>
      <article class="comment_text">
          ${comment}
      </article>
      <div class="comment_options">
          <button data-action="isEditing">Edit</button>
          <button data-action="isCommenting">Comment</button>
          <button data-action="show_all">Show Comments</button>
      </div>
      <div class="comment_edit">
          ${isEditing || isCommenting ? getEditCommentMarkup() : ""}
      </div>
      <div class="comments">
          ${
            isOpen
              ? comments.length > 0
                ? getCommentUL(comments, depth + 1)
                : '<p class="no_comment_found">No Comments Found :(</p>'
              : ""
          }
      </div>
  </div>
  `;
}

const getCommentList = (data = [], depth = 0) => {
const commentCards = [];
for (let id of data) {
  commentCards.push(getCommentCard(comments[id], depth));
}
return `
  <li>
      ${commentCards.join("")}
  </li>
  `;
};

const getEditCommentMarkup = () => {
return `
  <textarea name="comment_edit" id="comment_edit" class="comment_edit_textarea" cols="0" rows="0"></textarea>
  <p class="comment_edit_message">Please enter more than one character to accept comment.</p>
  <div class="comment_edit_options">
      <button data-action="submit">Submit</button>
      <button data-action="cancle">Cancle</button>
  </div>
  `;
};

const getCommentUL = (data = [], depth = 0) => {
return `
  <ul class="comment_list">
      ${getCommentList(data, depth)}
  </ul>
  `;
};

const handleClick = (event) => {
const action = event.target.dataset.action;
if (action) {
  const closeCommentCard = event.target.closest(
    CONSTANTS.CLOSEST_COMMENT_CARD
  );
  const commentID = closeCommentCard.id.split("-")[1];
  console.log(`action: ${action} on #comment-${commentID}`);
  switch (action) {
    case CONSTANTS.IS_EDITING:
    case CONSTANTS.IS_COMMENTING:
      updateisEditingorIsCommenting(closeCommentCard, commentID, action);
      break;
    case CONSTANTS.SHOW_ALL:
      updateIsOpen(closeCommentCard, commentID, action);
      break;
    case CONSTANTS.SUBMIT:
      handleEditorCommentSubmit(closeCommentCard, commentID);
      break;
    case CONSTANTS.CANCLE:
      handleEditCancle(closeCommentCard, commentID);
      break;
  }
}
};

const updateisEditingorIsCommenting = (closeCommentCard, commentID, action) => {
comments[commentID][action] = !comments[commentID][action];
if (action === CONSTANTS.IS_EDITING) {
  closeCommentCard.querySelector(CONSTANTS.COMMENT_TEXT).style.display =
    "none";
}
closeCommentCard.querySelector(CONSTANTS.EDIT_COMMENT).style[
  CONSTANTS.POINTER_EVENTS
] = "none";
closeCommentCard.querySelector(CONSTANTS.EDIT_COMMENT).style[
  CONSTANTS.OPACITY
] = CONSTANTS.DISABLE_OPACITY;
closeCommentCard.querySelector(CONSTANTS.COMMENT_COMENT).style[
  CONSTANTS.POINTER_EVENTS
] = "none";
closeCommentCard.querySelector(CONSTANTS.COMMENT_COMENT).style[
  CONSTANTS.OPACITY
] = CONSTANTS.DISABLE_OPACITY;
closeCommentCard.querySelector(
  CONSTANTS.COMMENT_EDIT
).innerHTML = getEditCommentMarkup();
};

const updateIsOpen = (closeCommentCard, commentID, action = "") => {
if (action === CONSTANTS.SHOW_ALL) {
  comments[commentID].isOpen = !comments[commentID].isOpen;
}
const { isOpen = false, comments: childComments = [] } = comments[commentID];
if (isOpen) {
  const depth = Number(closeCommentCard.dataset.depth);
  closeCommentCard.querySelector(CONSTANTS.SHOW_COMMENTS).textContent =
    TEXT_CONTENT.HIDE_COMMENTS;
  if (comments[commentID].comments.length === 0) {
    closeCommentCard.querySelector(CONSTANTS.COMMENTS).innerHTML =
      '<p class="no_comment_found">No Comments Found :(</p>';
  } else {
    closeCommentCard.querySelector(
      CONSTANTS.COMMENTS
    ).innerHTML = getCommentUL(childComments, depth + 1);
  }
} else {
  closeCommentCard.querySelector(CONSTANTS.SHOW_COMMENTS).textContent =
    TEXT_CONTENT.SHOW_COMMENTS;
  closeCommentCard.querySelector(CONSTANTS.COMMENTS).innerHTML = "";
}
};

const handleEditorCommentSubmit = (closeCommentCard, commentID) => {
const commentContent = closeCommentCard.querySelector(
  CONSTANTS.COMMENT_EDIT_TEXTAREA
).value;
if (commentContent.length <= 1) {
  closeCommentCard.querySelector(CONSTANTS.COMMENT_EDIT_MESSAGE).style.color =
    CONSTANTS.COLOR_RED;
  return;
}
if (comments[commentID].isEditing) {
  comments[commentID].comment = commentContent;
  closeCommentCard.querySelector(
    CONSTANTS.COMMENT_TEXT
  ).textContent = commentContent;
} else {
  const newComment = getNewComment(commentContent);
  comments[commentID].comments.push(newComment.id);
  comments[newComment.id] = newComment;
  updateIsOpen(closeCommentCard, commentID);
}
handleEditCancle(closeCommentCard, commentID);
};

const handleEditCancle = (closeCommentCard, commentID) => {
if (comments[commentID].isEditing) {
  closeCommentCard.querySelector(CONSTANTS.COMMENT_TEXT).style.display =
    "block";
}
comments[commentID].isEditing = false;
comments[commentID].isCommenting = false;
closeCommentCard.querySelector(CONSTANTS.EDIT_COMMENT).style[
  CONSTANTS.POINTER_EVENTS
] = "auto";
closeCommentCard.querySelector(CONSTANTS.EDIT_COMMENT).style[
  CONSTANTS.OPACITY
] = CONSTANTS.ENABLE_OPACITY;
closeCommentCard.querySelector(CONSTANTS.COMMENT_COMENT).style[
  CONSTANTS.POINTER_EVENTS
] = "auto";
closeCommentCard.querySelector(CONSTANTS.COMMENT_COMENT).style[
  CONSTANTS.OPACITY
] = CONSTANTS.ENABLE_OPACITY;
closeCommentCard.querySelector(CONSTANTS.COMMENT_EDIT).innerHTML = "";
};

DOMElements = getDOMElements();
DOMElements.commentSection.innerHTML = getCommentUL(Object.keys(comments), 0);
DOMElements.commentSection.addEventListener("click", handleClick);

function getDOMElements() {
let DOMElements = {};
for (let selector in DOMSelectors) {
  DOMElements[selector] = document.querySelector(DOMSelectors[selector]);
}
return DOMElements;
}
