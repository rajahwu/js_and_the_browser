import { useState, useCallback } from "react";
import AceEditor from "react-ace";
import "ace-builds/src-noconflict/mode-javascript";
import "ace-builds/src-noconflict/theme-monokai"; // Choose a theme


export default function CodeEditor() {
    const [value, setValue] = useState("console.log('hello world!');");
    const onChange = useCallback((val, viewUpdate) => {
        console.log('val:', val);
        setValue(val);
    }, []);
    return <AceEditor
        mode="javascript" // Set the programming language mode
        theme="monokai"   // Choose a theme
        name="code-editor"
        editorProps={{ $blockScrolling: true }}
        value={value} // Set the initial code value
        onChange={onChange} // Handle code changes
        fontSize={14} // Set font size
        width="100%" // Set the editor width
        height="250px" // Set the editor height
    />
}