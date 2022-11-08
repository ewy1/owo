import {EditorView, basicSetup} from "codemirror"
import {javascript} from "@codemirror/lang-javascript";

const text = document.querySelector("#value")?.value;
const extensions = [basicSetup, EditorView.lineWrapping];
const filename = document.querySelector("input#filename")?.value;

const darkTheme = EditorView.theme({
  "&": {
    color: "#ded5c8",
    backgroundColor: "#312f2f"
  },
  ".cm-content": {
    caretColor: "#ece7e7"
  },
  ".cm-activeLine": {
    backgroundColor: "#1e1d1d",
    caretColor: "#ffffff"
  },
  ".ͼe": {
    color: "#edadad"
  },
  ".ͼb": {
    color: "#bad1f9"
  },
  ".ͼg": {
    color: "#bef8d7"
  },
  ".ͼl": {
    color: "#fef5af"
  },
  ".ͼi": {
    color: "#f2cae2"
  }
}, {dark: true});

if (matchMedia("prefers-color-scheme: dark"))
  extensions.push(darkTheme);

if (filename.endsWith('.js'))
  extensions.push(javascript());

if (filename.endsWith('.jsx'))
  extensions.push(javascript({jsx: true}));

if (filename.endsWith('.ts'))
  extensions.push(javascript({typescript: true}));

if (filename.endsWith('.tsx'))
  extensions.push(javascript({typescript: true, jsx: true}));

const editor = new EditorView({
  extensions: extensions,
  parent: document.body,
  doc: text
});

document.querySelector("#save")?.addEventListener("click", () => {
  const payload = {
    payload: editor.state.doc.toString(),
    filename: document.querySelector("input#filename")?.value,
    base64: false,
    selfDestruct: document.querySelector("input.selfdestruct-toggle")?.checked
  };
  fetch("/new", {
    method: "POST",
    body: JSON.stringify(payload)
  }).then((result) => result.json().then((json) => {
    window.location.href = json.target;
  }));
});

editor.focus();
