using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class Score : MonoBehaviour
{
    public static int score = 0;
    void Start()
    {
        score = 0;
    }

    private void updateText()
    {
        GetComponent<TMP_Text>().text = score.ToString();
    }

    void Update()
    {
        updateText();
    }

}
