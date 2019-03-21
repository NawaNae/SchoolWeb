class ImageCmd {
    constructor(cmdType, url,name ,id) {
        this.type = cmdType;
        this.url = url;
        if (typeof name != "undefined") this.name = name;
        if (typeof id != "undefined") this.id = id;
    }
}
class TagJumpCmd {
    constructor(cmdType, tag) {
        this.type = cmdType;
        this.tag = tag;
    }
}
class TextCmd {
    constructor(cmdType, text) {
        this.type = cmdType;
        this.text = text;
    }
}
class DisplayCmd {
    constructor(cmdType, object) {
        this.type = cmdType;
        this.object = object;
    }
}
class OptionsCmd {
    constructor(text, tag) {
        this.text = text;
        this.tag = tag;
    }
}
class SelectCmd {
    constructor(cmdType, optionsText) {
        this.type = cmdType;
        this.option = new Array();
        var optionsSet = optionsText.split(/;/g);
        for (var i = 0; i < optionsSet.length; i++) {
            var sp = optionsSet[i].split(/,/g);
            this.option.push(new OptionsCmd(sp[0], sp[1]));
        }
    }
}

class CmdParse {
    constructor(text) {
        var sp = text.split(/ /g);
        this._type = sp[0];
        this._atrr = new Array();
        for (var i = 1; i < sp.length; i++)
            this._atrr.push(sp[i]);
    }
    parse() {
        switch (this.type) {
            case "background":
                return new ImageCmd(this.type, this.atrr[0]);
                break;
            case "character":
                return new ImageCmd(this.type, this.atrr[0], this.atrr[1], this.atrr[2]);
                break;
            case "talk":
            case "text":
                return new TextCmd(this.type, this.atrr[0]);
                break;
            case "jump":
            case "tag":
                return new TagJumpCmd(this.type, this.atrr[0]);
                break;
            case "select":
                return new SelectCmd(this.type, this.atrr[0]);
                break;
            case "show":
            case "hide":
                return new DisplayCmd(this.type, this.atrr[0]);
                break;

        }
    }
    ParseJSON() {
        return JSON.stringify(this.parse());
    }
    get type() {
        return this._type;
    }
    set type(text) {
        this._type = text;
    }
    get atrr() {
        return this._atrr;
    }
    set atrr(text) {
        this._atrr.clear();
        var sp = text.split(/ /g);
        for (var i = 0; i < sp.length; i++)
            this._atrr.push(sp[i]);
    }

}
function parse(text) {
    //var text = "background http://456789/ \ntalk 123456\n"
    text = text.replace(/[(|)]/g, " ");
    cmdtext = text.split(/\n/g);
    cmdList = new Array();

    for (var i = 0; i < cmdtext.length; i++) {
        if (cmdtext[i] == "")
            continue;
        var parser = new CmdParse(cmdtext[i]);
        cmdList.push(parser.parse());
        console.log(parser.ParseJSON());
    }
    return JSON.stringify(new Array(cmdList));
}
function preview()
{
    document.getElementsByClassName("visualNovel")[0].dataset.content = parse(document.getElementById('lrcinput').value);
    initialVisualNovel()
}