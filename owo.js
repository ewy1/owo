import {EditorView, basicSetup} from "codemirror"
import { oneDarkTheme} from "@codemirror/theme-one-dark";
import {javascript} from "@codemirror/lang-javascript";

const text = document.querySelector("#raw").textContent.slice(6, -7);
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
})

editor.focus();
