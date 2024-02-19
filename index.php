<!DOCTYPE html>
<html>
<head>
  <style>
     

    .grid {
      display: grid;
      grid-template-columns: repeat(12, 1fr);
      grid-template-rows: repeat(9);
      grid-gap: 5px;
    }

    .cell {
      width: 50px;
      height: 50px;
      background-color: #FFF;
      border: 1px solid #000;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .black {
      background-color: #000;
    }

    .word {
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
</head>
<body>
   

  
  <div class="grid">
    <?php
      
      $words = array("car", "house", "kedi", "cat", "dog", "elma", "muz", "sun", "moon", "star", "araba", "pen");

      // Grid boyutu
      $gridSize = 11;

      // Kelime sayısı
      $wordCount = count($words);

      // Her bir satır için döngü
      for ($row = 1; $row <= $gridSize; $row++) {
        // Her bir sütun için döngü
        for ($col = 1; $col <= $gridSize; $col++) {
          // Hücrenin başlangıçta hiçbir özel sınıfı yok
          $cellClass = "";

          // Siyah dolu kareleri rastgele yerleştiriyoruz
          if (rand(0, 1) === 1) {
            $cellClass = "black";
          }

          // İstediğiniz kelimeleri rastgele yerleştiriyoruz
          if ($wordCount > 0 && rand(0, 5) === 0 && $cellClass !== "black") {
            // Kelimelerin olduğu dizi içinden rastgele bir kelime seçilen yer
            $wordIndex = rand(0, $wordCount - 1);
            $word = $words[$wordIndex];
            $wordLength = strlen($word);

            // Hücreye "word" sınıfını ekliyoruz
            $cellClass .= " word";

            // Kelimeyi hücre içine bölerek ekliyoruz
            for ($i = 0; $i < $wordLength; $i++) {
              $letter = $word[$i];
              echo "<span class='cell $cellClass'>$letter</span>";
            }

            // Eklenen kelimeyi diziden kaldırıyoruz
            unset($words[$wordIndex]);
            // Dizi içinde boşlukları kapatıyoruz
            $words = array_values($words);
            // Toplam kelime sayısını azaltıyoruz
            $wordCount--;
          } else {
            // Kelime eklenmediyse, sadece siyah renkli bir hücre ekliyoruz
            echo "<div class='cell $cellClass'></div>";
          }
        }
      }
    ?>
  </div>

</body>
</html>
