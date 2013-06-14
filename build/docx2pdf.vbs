Option Explicit
 
Const CV_EN = "..\sources\files\S.Grigoriev_CV.docx"
Const CV_DE = "..\sources\files\S.Grigoriev_Lebenslauf.docx"
Const CV_RU = "..\sources\files\С.Григорьев_резюме.docx"
 
 
'Call the main routine
Main

' Main routine
Sub Main()
	SaveWordAsPDF(CV_EN)
	SaveWordAsPDF(CV_DE)
	SaveWordAsPDF(StrConv(CV_RU, "UTF-8", "windows-1251"))
End Sub
 
' This subroutine opens a Word document, then saves it as PDF, and closes Word.
' If the PDF file exists, it is overwritten.
' If Word was already active, the subroutine will leave the other document(s)
' alone and close only its "own" document.
Sub SaveWordAsPDF(inputFile)
	Dim objDocxFile, objFSO, objWord, objDocument

	Set objFSO = CreateObject("Scripting.FileSystemObject")
	If objFSO.FileExists(inputFile) Then
		Set objDocxFile = objFSO.GetFile(inputFile)
	Else
		WScript.Echo("File " & inputFile & " does not exist" & vbCrLf)
		WScript.Quit(1)
	End If

	Set objWord = CreateObject("Word.Application")
	
	objWord.Visible = False
	objWord.Documents.Open(objDocxFile.Path)

	Set objDocument = objWord.ActiveDocument
	objDocument.SaveAs objFSO.BuildPath(objDocxFile.ParentFolder, objFSO.GetBaseName(objDocxFile) & ".pdf"), 17
	objDocument.Close

	objWord.Quit
End Sub

Function StrConv(Text,SourceCharset,DestCharset)
	Dim Stream
	Set Stream = CreateObject("ADODB.Stream")
	Stream.Type = 2
	Stream.Mode = 3
	Stream.Open
	Stream.Charset = DestCharset
	Stream.WriteText Text
	Stream.Position = 0
	Stream.Charset = SourceCharset
	StrConv = Stream.ReadText
End Function