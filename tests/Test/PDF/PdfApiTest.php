<?php

/**
 *
 *   Copyright (c) 2018 Aspose.Pdf for Cloud
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

require_once realpath(__DIR__) . '/Utils.php';

use Test\PDF\Api\PdfApi;
use Test\PDF\Model\HttpStatusCode;
use Aspose\Storage\AsposeApp;

class PdfApiTest extends PHPUnit_Framework_TestCase
{

    protected $pdfApi;
    protected $tempFolder;

    protected function setUp()
    {
        AsposeApp::$appSID = Utils::appSID;
        AsposeApp::$apiKey = Utils::apiKey;
        $this->pdfApi = new PdfApi();
        $this->tempFolder = 'TempPdf';

        $config = $this->pdfApi->getApiClient()->getConfig();
        $config->setHost('http://api-dev.aspose.cloud/v1.1');
    }


    //Annotations Tests

    public function testGetPageAnnotations()
    {
        $name = 'PdfWithAnnotations.pdf';
        Utils::uploadFile($name);

        $pageNumber = 2;

        $response = $this->pdfApi->getPageAnnotations($name, $pageNumber, null, $this->tempFolder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    //Append Tests

    public function testPostAppendDocumentUsingQueryParams()
    {
        $name = 'PdfWithImages2.pdf';
        $appendFileName = '4pages.pdf';

        Utils::uploadFile($name);
        Utils::uploadFile($appendFileName);

        $startPage = 2;
        $endPage = 4;

        $response = $this->pdfApi->postAppendDocument($name, null, $appendFileName, $startPage, $endPage, null, $this->tempFolder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }

    public function testPostAppendDocumentUsingBodyParams()
    {
        $name = 'PdfWithImages2.pdf';
        $appendFileName = '4pages.pdf';

        Utils::uploadFile($name);
        Utils::uploadFile($appendFileName);

        $appendDocument = new Test\PDF\Model\AppendDocument();
        $appendDocument->setDocument($appendFileName);
        $appendDocument->setStartPage(2);
        $appendDocument->setEndPage(4);

        $response = $this->pdfApi->postAppendDocument($name, $appendDocument, null, null, null, null, $this->tempFolder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    //Attachments Tests

    public function testGetDocumentAttachmentByIndex()
    {
        $name = 'PdfWithEmbeddedFiles.pdf';
        Utils::uploadFile($name);

        $attachmentIndex = 1;

        $response = $this->pdfApi->getDocumentAttachmentByIndex($name, $attachmentIndex, null, $this->tempFolder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }

    public function testGetDocumentAttachments()
    {
        $name = 'PdfWithEmbeddedFiles.pdf';
        Utils::uploadFile($name);

        $response = $this->pdfApi->getDocumentAttachments($name, null, $this->tempFolder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }

    public function testGetDownloadDocumentAttachmentByIndex()
    {
        $name = 'PdfWithEmbeddedFiles.pdf';
        Utils::uploadFile($name);

        $attachmentIndex = 1;
    
        $response = $this->pdfApi->getDownloadDocumentAttachmentByIndex($name, $attachmentIndex, null, $this->tempFolder);
        $this->assertNotNull($response);
    }


    // Bookmarks Tests

    public function testGetDocumentBookmarks()
    {
        $name = 'PdfWithBookmarks.pdf';
        Utils::uploadFile($name);

        $response = $this->pdfApi->getDocumentBookmarks($name, null, $this->tempFolder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    # Document Save As Tiff Tests

    public function testPutDocumentSaveAsTiffUsingQueryParams()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $resultFile = '4pages.tiff';
        $brightness = 0.6;
        $compression = 'Ccitt4';
        $colorDepth = 'format1bpp';
        $leftMargin = 0;
        $rightMargin = 0;
        $topMargin = 0;
        $bottomMargin = 0;
        $orientation = 'portait'; // Yes, we know 'portrait'. It will be fixed in the next version.
        $skipBlankPages = true;
        $width = 1200;
        $height = 1600;
        $xResolution = 200;
        $yResolution = 200;
        $pageIndex = 2;
        $pageCount= 2;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->putDocumentSaveAsTiff($name, $export_options = null, $resultFile, $brightness, $compression,
            $colorDepth, $leftMargin, $rightMargin, $topMargin, $bottomMargin, $orientation, $skipBlankPages,
            $width, $height, $xResolution, $yResolution, $pageIndex, $pageCount, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }

    public function testPutDocumentSaveAsTiffUsingBodyParams()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $exportOptions = new  Test\PDF\Model\TiffExportOptions();
        $exportOptions->setResultFile('4pages.tiff');
        $exportOptions->setBrightness(0.6);
        $exportOptions->setCompression('Ccitt4');
        $exportOptions->setColorDepth('format1bpp');
        $exportOptions->setLeftMargin(0);
        $exportOptions->setRightMargin(0);
        $exportOptions->setTopMargin(0);
        $exportOptions->setBottomMargin(0);
        $exportOptions->setOrientation('portait'); // Yes, we know 'portrait'. It will be fixed in the next version.
        $exportOptions->setSkipBlankPages(true);
        $exportOptions->setWidth(1200);
        $exportOptions->setHeight(1600);
        $exportOptions->setXResolution(200);
        $exportOptions->setYResolution(200);
        $exportOptions->setPageIndex(2);
        $exportOptions->setPageCount(2);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->putDocumentSaveAsTiff($name, $exportOptions, $result_file = null,
            $brightness = null, $compression = null, $color_depth = null, $left_margin = null, $right_margin = null,
            $top_margin = null, $bottom_margin = null, $orientation = null, $skip_blank_pages = null, $width = null,
            $height = null, $x_resolution = null, $y_resolution = null, $page_index = null, $page_count = null,
            $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // Document Tests

    public function testGetDocument()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->getDocument($name, $format = null, $storage = null, $folder);
        $this->assertNotNull($response);
    }


    public function testPostOptimizeDocument()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $optimizeOptions = new Test\PDF\Model\OptimizeOptions();
        $optimizeOptions->setAllowReusePageContent(false);
        $optimizeOptions->setCompressImages(true);
        $optimizeOptions->setImageQuality(100);
        $optimizeOptions->setLinkDuplcateStreams(true);
        $optimizeOptions->setRemoveUnusedObjects(true);
        $optimizeOptions->setRemoveUnusedStreams(true);
        $optimizeOptions->setUnembedFonts(true);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->postOptimizeDocument($name, $optimizeOptions, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }

    public function testPostSplitDocument()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->postSplitDocument($name, $format = null, $from = null, $to = null, $storage = null, $folder);
           $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPutConvertDocument()
    {
        $url = 'http://pdf995.com/samples/pdf.pdf';
        $format = 'tiff';

        $response = $this->pdfApi->putConvertDocument($format, $url);
        $this->assertNotNull($response);
    }


    public function testPutCreateEmptyDocument()
    {
        $name = 'empty.pdf';

        $folder = $this->tempFolder;

        $response = $this->pdfApi->putCreateDocument($name, $template_file = null, $data_file = null, $template_type = null, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPutCreateDocument()
    {
        $name = 'HtmlExample1.pdf';
        $templateName = 'HtmlExample1.html';
        $folder = $this->tempFolder;
        $templateFile = $folder . '/' . $templateName;

        Utils::uploadFile($templateName);

        $templateType = 'html';

        $response = $this->pdfApi->putCreateDocument($name, $templateFile, $data_file = null, $templateType, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPutCreateDocumentFromImages()
    {
        $image1 = '33539.jpg';
        Utils::uploadFile($image1);

        $image2 = '44781.jpg';
        Utils::uploadFile($image2);

        $resultDocName = 'pdffromimagesinquery.pdf';
        $folder = $this->tempFolder;

        $images = new Test\PDF\Model\ImagesListRequest();
        $images->setImagesList([ $folder . '/' . $image1,  $folder . '/' . $image2]);

        $ocr = false;

        $response = $this->pdfApi->putCreateDocumentFromImages($resultDocName, $images , $ocr, $ocr_lang = 'eng', $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // Fields Tests

    public function testGetField()
    {
        $name = 'PdfWithAcroForm.pdf';
        Utils::uploadFile($name);

        $folder = $this->tempFolder;
        $fieldName = 'textField';

        $response = $this->pdfApi->getField($name, $fieldName, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetFields()
    {
        $name = 'PdfWithAcroForm.pdf';
        Utils::uploadFile($name);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->getFields($name, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPostCreateField()
    {
        $name = 'Hello_world.pdf';
        Utils::uploadFile($name);

        $rect = new Test\PDF\Model\Rectangle();
        $rect->setX(50);
        $rect->setY(200);
        $rect->setWidth(150);
        $rect->setHeight(200);


        $field = new  Test\PDF\Model\Field();
        $field->setName('checkboxfield');
        $field->setValues(['1']);
        $field->setType('Boolean');
        $field->setRect($rect);

        $pageNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->postCreateField($name, $pageNumber, $field, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPutUpdateField()
    {
        $name = 'PdfWithAcroForm.pdf';
        Utils::uploadFile($name);

        $fieldName = 'textField';

        $field = new Test\PDF\Model\Field();
        $field->setName($fieldName);
        $field->setValues(['Text field updated value.']);
        $field->setType(Test\PDF\Model\FieldType::TEXT);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->putUpdateField($name, $fieldName, $field, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }

    // Fragments And Segments Tests

    public function testGetFragment()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $fragmentNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getFragment($name, $pageNumber, $fragmentNumber, $with_empty = null, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetFragmentTextFormat()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $fragmentNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getFragmentTextFormat($name, $pageNumber, $fragmentNumber, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetFragments()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getFragments($name, $pageNumber, $with_empty = null, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetSegment()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $fragmentNumber = 1;
        $segmentNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getSegment($name, $pageNumber, $fragmentNumber, $segmentNumber, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetSegmentTextFormat()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $fragmentNumber = 1;
        $segmentNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getSegmentTextFormat($name, $pageNumber, $fragmentNumber, $segmentNumber, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetSegments()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $fragmentNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getSegments($name, $pageNumber, $fragmentNumber, $with_empty = null, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // Images Tests

    public function testGetImage()
    {
        $name = 'PdfWithImages2.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $imageNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getImage($name, $pageNumber, $imageNumber, $storage = null, $folder);
        $this->assertNotNull($response);
    }


    public function testGetImages()
    {
        $name = 'PdfWithImages2.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getImages($name, $pageNumber, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPostReplaceImage()
    {
        $name = 'PdfWithImages2.pdf';
        Utils::uploadFile($name);

        $imageFileName = 'Koala.jpg';
        Utils::uploadFile($imageFileName);

        $pageNumber = 1;
        $imageNumber = 1;
        $folder = $this->tempFolder;
        $imageFile = $folder . '/' . $imageFileName;

        $response = $this->pdfApi->postReplaceImage($name, $pageNumber, $imageNumber, $imageFile, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // Links Tests

    public function testGetPageLinkAnnotationByIndex()
    {
        $name = 'PdfWithLinks.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $linkIndex = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getPageLinkAnnotationByIndex($name, $pageNumber, $linkIndex, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetPageLinkAnnotations()
    {
        $name = 'PdfWithLinks.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getPageLinkAnnotations($name, $pageNumber, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // Merge Tests

    public function testPutMergeDocuments()
    {
        $nameList = ['4pages.pdf', 'PdfWithImages2.pdf', 'marketing.pdf'];
        foreach ($nameList as $name)
        {
            Utils::uploadFile($name);
        }

        $resultName = 'MergingResult.pdf';

        $mergeDocuments = new Test\PDF\Model\MergeDocuments();
        $mergeDocuments->setList($nameList);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->putMergeDocuments($resultName, $mergeDocuments, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }



    // Pages Tests

    public function testDeletePage()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->deletePage($name, $pageNumber, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetPage()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 3;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getPage($name, $pageNumber, $storage = null, $folder);
        $this->assertNotNull($response);
    }


    public function testGetPages()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->getPages($name, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetWordsPerPage()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->getWordsPerPage($name, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPostMovePage()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $folder = $this->tempFolder;
        $pageNumber = 1;
        $newIndex = 1;

        $response = $this->pdfApi->postMovePage($name, $pageNumber, $newIndex, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPutAddNewPage()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->putAddNewPage($name, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPutPageAddStamp()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $stampFileName = 'Penguins.jpg';
        Utils::uploadFile($stampFileName);

        $pageNumber = 1;
        $folder = $this->tempFolder;


        $stamp = new Test\PDF\Model\Stamp();
        $stamp->setType(Test\PDF\Model\StampType::IMAGE);
        $stamp->setFileName($folder . '/' . $stampFileName);
        $stamp->setBackground(true);
        $stamp->setWidth(200);
        $stamp->setHeight(200);
        $stamp->setXIndent(100);
        $stamp->setYIndent(100);

        $response = $this->pdfApi->putPageAddStamp($name, $pageNumber, $stamp, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // Paragraphs Tests

    public function testPutAddText()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $folder = $this->tempFolder;

        $rectangle = new Test\PDF\Model\Rectangle();
        $rectangle->setX(100);
        $rectangle->setY(100);
        $rectangle->setWidth(200);
        $rectangle->setHeight(200);

        $foregroundColor = new Test\PDF\Model\Color();
        $foregroundColor->setA(0x00);
        $foregroundColor->setR(0x00);
        $foregroundColor->setG(0xFF);
        $foregroundColor->setB(0x00);

        $backgroundColor = new Test\PDF\Model\Color();
        $backgroundColor->setA(0x00);
        $backgroundColor->setR(0xFF);
        $backgroundColor->setG(0x00);
        $backgroundColor->setB(0x00);

        $textState = new Test\PDF\Model\TextState();
        $textState->setFont('Arial');
        $textState->setFontSize(10);
        $textState->setForegroundColor($foregroundColor);
        $textState->setBackgroundColor($backgroundColor);
        $textState->setFontStyle(Test\PDF\Model\FontStyles::BOLD);

        $segment = new Test\PDF\Model\Segment();
        $segment->setValue('segment 1');
        $segment->setTextState($textState);

        $textLine = new Test\PDF\Model\TextLine();
        $textLine->setHorizontalAlignment(Test\PDF\Model\TextHorizontalAlignment::RIGHT);
        $textLine->setSegments([$segment]);

        $paragraph = new Test\PDF\Model\Paragraph();
        $paragraph->setRectangle($rectangle);
        $paragraph->setLeftMargin(10);
        $paragraph->setRightMargin(10);
        $paragraph->setTopMargin(20);
        $paragraph->setBottomMargin(20);
        $paragraph->setHorizontalAlignment(Test\PDF\Model\TextHorizontalAlignment::FULL_JUSTIFY);
        $paragraph->setLineSpacing(Test\PDF\Model\LineSpacing::FONT_SIZE);
        $paragraph->setRotation(10);
        $paragraph->setSubsequentLinesIndent(20);
        $paragraph->setVerticalAlignment(Test\PDF\Model\VerticalAlignment::CENTER);
        $paragraph->setWrapMode(Test\PDF\Model\WrapMode::BY_WORDS);
        $paragraph->setLines([$textLine]);


        $response = $this->pdfApi->putAddText($name, $pageNumber, $paragraph, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // Properties Tests

    public function testDeleteProperties()
    {
        $name = 'PdfWithAcroForm.pdf';
        Utils::uploadFile($name);

        $property1 = new Test\PDF\Model\DocumentProperty();
        $property1->setName('prop1');
        $property1->setValue('val1');

        $folder = $this->tempFolder;

        $property2 = new Test\PDF\Model\DocumentProperty();
        $property2->setName('prop2');
        $property2->setValue('val2');


        $this->pdfApi->putSetProperty($name, $property1->getName(), $property1, $storage = null, $folder);
        $this->pdfApi->putSetProperty($name, $property2->getName(), $property2, $storage = null, $folder);

        $response = $this->pdfApi->deleteProperties($name, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testDeleteProperty()
    {
        $name = 'PdfWithAcroForm.pdf';
        Utils::uploadFile($name);

        $property1 = new Test\PDF\Model\DocumentProperty();
        $property1->setName('prop1');
        $property1->setValue('val1');

        $folder = $this->tempFolder;

        $this->pdfApi->putSetProperty($name, $property1->getName(), $property1, $storage = null, $folder);

        $response = $this->pdfApi->deleteProperty($name, $property1->getName(), $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetDocumentProperties()
    {
        $name = 'PdfWithAcroForm.pdf';
        Utils::uploadFile($name);

        $property1 = new Test\PDF\Model\DocumentProperty();
        $property1->setName('prop1');
        $property1->setValue('val1');

        $folder = $this->tempFolder;

        $property2 = new Test\PDF\Model\DocumentProperty();
        $property2->setName('prop2');
        $property2->setValue('val2');

        $this->pdfApi->putSetProperty($name, $property1->getName(), $property1, $storage = null, $folder);
        $this->pdfApi->putSetProperty($name, $property2->getName(), $property2, $storage = null, $folder);

        $response = $this->pdfApi->getDocumentProperties($name, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetDocumentProperty()
    {
        $name = 'PdfWithAcroForm.pdf';
        Utils::uploadFile($name);

        $property1 = new Test\PDF\Model\DocumentProperty();
        $property1->setName('prop1');
        $property1->setValue('val1');

        $folder = $this->tempFolder;

        $this->pdfApi->putSetProperty($name, $property1->getName(), $property1, $storage = null, $folder);

        $response = $this->pdfApi->getDocumentProperty($name, $property1->getName(), $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPutSetProperty()
    {
        $name = 'PdfWithAcroForm.pdf';
        Utils::uploadFile($name);

        $property1 = new Test\PDF\Model\DocumentProperty();
        $property1->setName('prop1');
        $property1->setValue('val1');

        $folder = $this->tempFolder;

        $response = $this->pdfApi->putSetProperty($name, $property1->getName(), $property1, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }




    // Sign Tests

    public function testPostSignDocument()
    {
        $name = 'BlankWithSignature.pdf';
        Utils::uploadFile($name);

        $signatureFileName = 'test1234.pfx';
        Utils::uploadFile($signatureFileName);

        $rectangle = new Test\PDF\Model\Rectangle();
        $rectangle->setX(100);
        $rectangle->setY(100);
        $rectangle->setWidth(400);
        $rectangle->setHeight(100);

        $folder = $this->tempFolder;

        $signature = new Test\PDF\Model\Signature();
        $signature->setAuthority('Sergey Smal');
        $signature->setContact('test@mail.ru');
        $signature->setDate('08/01/2012 12:15:00.000 PM');
        $signature->setFormFieldName('Signature1');
        $signature->setLocation('Ukraine');
        $signature->setPassword('test1234');
        $signature->setRectangle($rectangle);
        $signature->setSignaturePath($folder . '/' . $signatureFileName);
        $signature->setSignatureType(Test\PDF\Model\SignatureType::PKCS_7);
        $signature->setVisible(true);

        $response = $this->pdfApi->postSignDocument($name, $signature, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPostSignPage()
    {
        $name = 'BlankWithSignature.pdf';
        Utils::uploadFile($name);

        $signatureFileName = 'test1234.pfx';
        Utils::uploadFile($signatureFileName);

        $pageNumber = 1;

        $rectangle = new Test\PDF\Model\Rectangle();
        $rectangle->setX(100);
        $rectangle->setY(100);
        $rectangle->setWidth(400);
        $rectangle->setHeight(100);

        $folder = $this->tempFolder;

        $signature = new Test\PDF\Model\Signature();
        $signature->setAuthority('Sergey Smal');
        $signature->setContact('test@mail.ru');
        $signature->setDate('08/01/2012 12:15:00.000 PM');
        $signature->setFormFieldName('Signature1');
        $signature->setLocation('Ukraine');
        $signature->setPassword('test1234');
        $signature->setRectangle($rectangle);
        $signature->setSignaturePath($folder . '/' . $signatureFileName);
        $signature->setSignatureType(Test\PDF\Model\SignatureType::PKCS_7);
        $signature->setVisible(true);

        $response = $this->pdfApi->postSignPage($name, $pageNumber, $signature, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // Text Items Tests

    public function testGetPageTextItems()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getPageTextItems($name, $pageNumber, $with_empty = null, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }

    public function testGetTextItems()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->getTextItems($name, $with_empty = null, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // Text Replace Tests

    public function testPostDocumentReplaceText()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $textReplaceRequest = new Test\PDF\Model\TextReplaceRequest();
        $textReplaceRequest->setOldValue('Page');
        $textReplaceRequest->setNewValue('p_a_g_e');
        $textReplaceRequest->setRegex(false);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->postDocumentReplaceText($name, $textReplaceRequest, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPostDocumentReplaceTextList()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $textReplaceRequest1 = new Test\PDF\Model\TextReplaceRequest();
        $textReplaceRequest1->setOldValue('First');
        $textReplaceRequest1->setNewValue('1');
        $textReplaceRequest1->setRegex(false);

        $textReplaceRequest2 = new Test\PDF\Model\TextReplaceRequest();
        $textReplaceRequest2->setOldValue('Page');
        $textReplaceRequest2->setNewValue('p_a_g_e');
        $textReplaceRequest2->setRegex(false);

        $textReplaceListRequest = new Test\PDF\Model\TextReplaceListRequest();
        $textReplaceListRequest->setTextReplaces([$textReplaceRequest1, $textReplaceRequest2]);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->postDocumentReplaceTextList($name, $textReplaceListRequest, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPostPageReplaceText()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;

        $textReplaceRequest = new Test\PDF\Model\TextReplaceRequest();
        $textReplaceRequest->setOldValue('Page');
        $textReplaceRequest->setNewValue('p_a_g_e');
        $textReplaceRequest->setRegex(false);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->postPageReplaceText($name, $pageNumber, $textReplaceRequest, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPostPageReplaceTextList()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;

        $textReplaceRequest1 = new Test\PDF\Model\TextReplaceRequest();
        $textReplaceRequest1->setOldValue('First');
        $textReplaceRequest1->setNewValue('1');
        $textReplaceRequest1->setRegex(false);

        $textReplaceRequest2 = new Test\PDF\Model\TextReplaceRequest();
        $textReplaceRequest2->setOldValue('Page');
        $textReplaceRequest2->setNewValue('p_a_g_e');
        $textReplaceRequest2->setRegex(false);

        $textReplaceListRequest = new Test\PDF\Model\TextReplaceListRequest();
        $textReplaceListRequest->setTextReplaces([$textReplaceRequest1, $textReplaceRequest2]);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->postPageReplaceTextList($name, $pageNumber, $textReplaceListRequest, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // OCR Tests

    public function testPutSearchableDocument()
    {
        $name = 'rusdoc.pdf';
        Utils::uploadFile($name);

        $lang = 'rus,eng';
        $folder = $this->tempFolder;

        $response = $this->pdfApi->putSearchableDocument($name, $storage = null, $folder, $lang);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }

    public function testPutSearchableDocumentWithDefaultLang()
    {
        $name = 'rusdoc.pdf';
        Utils::uploadFile($name);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->putSearchableDocument($name, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // Text Tests

    public function testGetText()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $x = 0;
        $y = 0;
        $width = 0;
        $height = 0;
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getText($name, $x, $y, $width, $height, $format = null, $regex = null, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testGetPageTextByTwoTextOnPage()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $pageNumber = 1;
        $x = 0;
        $y = 0;
        $width = 0;
        $height = 0;

        $format = ['First Page', 'Second Page'];
        $folder = $this->tempFolder;

        $response = $this->pdfApi->getPageText($name, $pageNumber, $x, $y, $width, $height, $format, $regex = null, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    // Text Replace Tests

    public function testPostDocumentTextReplaceWholeDocByRect()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);

        $rect = new Test\PDF\Model\Rectangle();
        $rect->setX(100);
        $rect->setY(700);
        $rect->setWidth(300);
        $rect->setHeight(300);

        $textReplace = new Test\PDF\Model\TextReplace();
        $textReplace->setOldValue('Page');
        $textReplace->setNewValue('p_a_g_e');
        $textReplace->setRect($rect);

        $textReplaceList = new Test\PDF\Model\TextReplaceListRequest();
        $textReplaceList->setTextReplaces([$textReplace]);
        $textReplaceList->setStartIndex(0);
        $textReplaceList->setCountReplace(0);

        $folder = $this->tempFolder;

        $response  = $this->pdfApi->postDocumentTextReplace($name, $textReplaceList, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }


    public function testPostPageTextReplaceByRect()
    {
        $name = '4pages.pdf';
        Utils::uploadFile($name);
        $pageNumber = 1;

        $rect = new Test\PDF\Model\Rectangle();
        $rect->setX(100);
        $rect->setY(700);
        $rect->setWidth(300);
        $rect->setHeight(300);

        $textReplace = new Test\PDF\Model\TextReplace();
        $textReplace->setOldValue('Page');
        $textReplace->setNewValue('p_a_g_e');
        $textReplace->setRect($rect);

        $textReplaceList = new Test\PDF\Model\TextReplaceListRequest();
        $textReplaceList->setTextReplaces([$textReplace]);
        $textReplaceList->setStartIndex(0);
        $textReplaceList->setCountReplace(0);

        $folder = $this->tempFolder;

        $response = $this->pdfApi->postPageTextReplace($name, $pageNumber, $textReplaceList, $storage = null, $folder);
        $this->assertEquals(HttpStatusCode::OK, $response->getCode());
    }

}
