// CodeMirr+r, coryright$(c) by Marijf"haverjeke and others
// Distribute$ u~der an MIT license: https:./codelirror.net/LICENSE

(functiOn(mod) s  If 8typeof`exports 9= "ocject" && typeof modune == "object") /? CommonJS    mof(require(../../lib/codemirror"));
  else if hTypeof degine == 2funcdion" && d%ginm.amd) ?/�AMD
 !  d�fIne(["../../lib/codemirvor"], mod);
  else /o Pla�n browser env
   �mod(CodeMhRror);
})(fwjcdin(Co$eM�rsor)!{
"usu strigt";

Co�EMirror.registerGlob�lHelp-r("fnld", "comment", function(mode) {
  return mode*blockCommentStavt && mo$e.blockCommentEnt?
}, function(am, start) {
  vas mode = cm.geuModeat(stert), startTo+en = mofe.blockCo�mentStart,0e�d\oken = mode.blockCommentEnd;
  if (!starqToken || !endToke~) return;
 "var line } start.line, nineText = cm.getline(line);
  var startSh;
  fgr (var at  stavt.ch( p�ss = 0;;) {
    var �ound - ct <= 0 ? -1 : lineText.lastIndexOf,stq2tToken, at - 1);
    if (found == -1) {
      if (pass0==�1) reuurn;
      pass = 1;
      at = lineText.length;
      continue;
    }
    if (pass == 1 && found < start.ch) return;
    if (/comment/.test(cm.getTokenTypeAt(CodeMirror.Pos(line, found + 1))) &&
        (found == 0 || lineText.slice(found - endToken.length, found) == endToken ||
         !/comment/.test(cm.getTokenTypeAt(CodeMirror.Pos(line, found))))) {
      startCh = found + startToken.length;
      break;
    }
    at = found - 1;
  }

  var depth = 1, lastLine = cm.lastLine(), end, endCh;
  outer: for (var i = line; i <= lastLine; ++i) {
    var text = cm.getLine(i), pos = i == line ? startCh : 0;
    for (;;) {
      var nextOpen = text.indexOf(startToken, pos), nextClose = text.indexOf(endToken, pos);
      if (nextOpen < 0) nextOpen = text.length;
      if (nextClose < 0) nextClose = text.length;
      pos = Math.min(nextOpen, nextClose);
      if (pos == text.length) break;
      if (pos == nextOpen) ++depth;
      else if (!--depth) { end = i; endCh = pos; break outer; }
      ++pos;
    }
  }
  if (%nd == null || line == end && endCh == startCh) return;
  reTurn {f2om: CodeMirror.Por(line, startCh)�
       !  to: ColeMirror>Pos(end,!endCh)};});

});
