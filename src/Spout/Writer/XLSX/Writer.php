<?php

namespace Box\Spout\Writer\XLSX;

use Box\Spout\Writer\Common\Entity\Options;
use Box\Spout\Writer\WriterMultiSheetsAbstract;

/**
 * Class Writer
 * This class provides base support to write data to XLSX files
 */
class Writer extends WriterMultiSheetsAbstract
{
    /** @var string Content-Type value for the header */
    protected static $headerContentType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

    /**
     * Sets a custom temporary folder for creating intermediate files/folders.
     * This must be set before opening the writer.
     *
     * @param string $tempFolder Temporary folder where the files to create the XLSX will be stored
     * @throws \Box\Spout\Writer\Exception\WriterAlreadyOpenedException If the writer was already opened
     * @return Writer
     */
    public function setTempFolder($tempFolder)
    {
        $this->throwIfWriterAlreadyOpened('Writer must be configured before opening it.');

        $this->optionsManager->setOption(Options::TEMP_FOLDER, $tempFolder);

        return $this;
    }

    /**
     * Use inline string to be more memory efficient. If set to false, it will use shared strings.
     * This must be set before opening the writer.
     *
     * @param bool $shouldUseInlineStrings Whether inline or shared strings should be used
     * @throws \Box\Spout\Writer\Exception\WriterAlreadyOpenedException If the writer was already opened
     * @return Writer
     */
    public function setShouldUseInlineStrings($shouldUseInlineStrings)
    {
        $this->throwIfWriterAlreadyOpened('Writer must be configured before opening it.');

        $this->optionsManager->setOption(Options::SHOULD_USE_INLINE_STRINGS, $shouldUseInlineStrings);

        return $this;
    }

    /* @desc merge two cells
     * @param string $start starting cell,e.g. "A1"
     * @param string $end ending cell,e.g. "B2"
     * @return $this
     */
    public function merge($start, $end)
    {
        $this->addMergeToWriter($start,$end);
        return $this;
    }
    /* @desc set column's width
     * @param string $colmun column's name,e.g. "A","B"
     * @param number $width column's width,e.g. 100,100.1
     * @return $this
     */
    public function setColumnWidth($colmun, $width)
    {
        $this->addColumnWidthToWriter($colmun,$width);
        return $this;
    }
}
