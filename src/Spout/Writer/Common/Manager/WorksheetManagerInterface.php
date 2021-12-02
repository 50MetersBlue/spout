<?php

namespace Box\Spout\Writer\Common\Manager;

use Box\Spout\Common\Entity\Row;
use Box\Spout\Writer\Common\Entity\Worksheet;

/**
 * Interface WorksheetManagerInterface
 * Inteface for worksheet managers, providing the generic interfaces to work with worksheets.
 */
interface WorksheetManagerInterface
{
    /**
     * Adds a row to the worksheet.
     *
     * @param Worksheet $worksheet The worksheet to add the row to
     * @param Row $row The row to be added
     * @throws \Box\Spout\Common\Exception\IOException If the data cannot be written
     * @throws \Box\Spout\Common\Exception\InvalidArgumentException If a cell value's type is not supported
     * @return void
     */
    public function addRow(Worksheet $worksheet, Row $row);

    /**
     * Prepares the worksheet to accept data
     *
     * @param Worksheet $worksheet The worksheet to start
     * @throws \Box\Spout\Common\Exception\IOException If the sheet data file cannot be opened for writing
     * @return void
     */
    public function startSheet(Worksheet $worksheet);

    /**
     * Closes the worksheet
     *
     * @param Worksheet $worksheet
     * @return void
     */
    public function close(Worksheet $worksheet);

    /* @desc merge two cells
     * @param string $start starting cell,e.g. "A1","B2","C3"
     * @param string $end ending cell,e.g. "A1","B2","C3"
     */
    public function merge(Worksheet $worksheet,$start,$end);

    /* @desc set column's width
     * @param string $column colunm's name,e.g. "A1","B2","C3"
     * @param int $width columns's width,e.g. 100,123.456
     */
    public function setColumnWidth(Worksheet $worksheet,$column,$width);
}
