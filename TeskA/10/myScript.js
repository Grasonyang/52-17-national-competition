// alert(1)
const route = (event) => {
  // console.log(window.event)
  event = event || window.event;
  event.preventDefault();
  window.history.pushState({}, "", event.target.href);
  handlelocation();
};

const routes = {
  "/a.html": "/a.html",
  "/b.html": "/b.html",
  "/c.html": "/c.html",
};

const handlelocation = async () => {
  const path = window.location.pathname;
  const route = routes[path];
  $("nav").remove();
  const html = await fetch(route).then((data) => data.text());
  document.getElementById("place").innerHTML = html;
};

window.onpopstate = handlelocation;
handlelocation();
// window.route = route();

