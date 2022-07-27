import {EditorView, basicSetup} from "codemirror"
import { oneDarkTheme} from "@codemirror/theme-one-dark";

const text = document.querySelector("#raw").textContent.slice(6, -7);
const extensions = [basicSetup];

if (matchMedia("prefers-color-scheme: dark"))
  extensions.push(oneDarkTheme);

const editor = new EditorView({
  extensions: extensions,
  parent: document.body,
  doc: text
})

editor.focus();
