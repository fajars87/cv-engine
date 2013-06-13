Option Explicit
 
Const CV_EN = "..\files\S.Grigoriev_CV.docx"
Const CV_DE = "..\files\S.Grigoriev_Lebenslauf.docx"
Const CV_RU = "..\files\С.Григорьев_резюме.docx"
 
 
'Call the main routine
Main

' Main routine
Sub Main()
	SaveWordAsPDF CV_EN
	SaveWordAsPDF CV_DE
	SaveWordAsPDF CV_RU
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
		WScript.Echo "File " & inputFile & " does not exist" & vbCrLf
		WScript.Quit 1
	End If

	Set objWord = CreateObject( "Word.Application" )
	
	objWord.Visible = False
	objWord.Documents.Open objDocxFile.Path

	Set objDocument = objWord.ActiveDocument
	objDocument.SaveAs objFSO.BuildPath( objDocxFile.ParentFolder, objFSO.GetBaseName( objDocxFile ) & ".pdf" ), 17
	objDocument.Close

	objWord.Quit
End Sub
