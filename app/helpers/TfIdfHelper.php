<?php

namespace App\Helpers;

class TfIdfHelper
{
  public static function computeTF($doc)
  {
    $tf = [];
    $totalTerms = count($doc);
    $termCount = array_count_values($doc);

    foreach ($termCount as $term => $count) {
      $tf[$term] = $count / $totalTerms;
    }

    return $tf;
  }

  public static function computeIDF($docs)
  {
    $idf = [];
    $totalDocs = count($docs);
    $termDocs = [];

    foreach ($docs as $doc) {
      foreach (array_unique($doc) as $term) {
          $termDocs[$term] = ($termDocs[$term] ?? 0) + 1;
      }
    }

    foreach ($termDocs as $term => $count) {
      $idf[$term] = log($totalDocs / $count, 10);
    }

    return $idf;
  }

  public static function computeTFIDF($tf, $idf)
  {
    $tfidf = [];
    foreach ($tf as $term => $tfValue) {
      $tfidf[$term] = $tfValue * ($idf[$term] ?? 0);
    }
    return $tfidf;
  }
}
