import {EditorView, basicSetup} from "codemirror"
import {oneDarkTheme} from "@codemirror/theme-one-dark";
import {javascript} from "@codemirror/lang-javascript";

const text = document.querySelector("#raw").textContent.slice(5, -6);
const extensions = [basicSetup];
const filename = document.querySelector("header").textContent;

if (matchMedia("prefers-color-scheme: dark"))
  extensions.push(oneDarkTheme);

if (filename.endsWith('.js') || filename.endsWith('.jsx'))
  extensions.push(javascript());

const editor = new EditorView({
  extensions: extensions,
  parent: document.body,
  doc: text
});

document.querySelector("#save").addEventListener("click", () => {
  const payload = {
    payload: btoa(editor.state.doc.toString()),
    filename: document.querySelector("input#filename").value,
    base64: true
  };
  fetch("/new", {
    method: "POST",
    body: JSON.stringify(payload)
  }).then((result) => result.json().then((json) => {
    window.location.href = json.target;
  }));
});

editor.focus();
