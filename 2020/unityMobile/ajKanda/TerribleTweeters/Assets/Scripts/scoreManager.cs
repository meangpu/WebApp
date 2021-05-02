using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using TMPro;

public class scoreManager : MonoBehaviour
{
    public TextMeshProUGUI scoreNumText;
    public int score;


    void Start()
    {
        addScore(0);
    }

    public void addScore(int newscore)
    {
        score += newscore;
        scoreNumText.text = score.ToString();
    }
}
