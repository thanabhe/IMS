SELECT
  COUNT
  (
    CASE WHEN status == 'sent' THEN '1' ELSE '0' END
  ) AS TOTAL_SENT,
  COUNT
  (
    CASE WHEN status == 'receive' THEN '1' ELSE '0' END
  ) AS TOTAL_RECEIVE
  
  FROM pengiriman
  WHERE 
    MONTH(tgl_kirim) = $
    AND YEAR(tgl_kirim) = $
  GROUP BY TOTAL_SENT, TOTAL_RECEIVE