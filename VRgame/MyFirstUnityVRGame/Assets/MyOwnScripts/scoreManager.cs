using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class scoreManager : MonoBehaviour
{
    public TextMeshPro textField;
    public int score;

    void Start()
    {
        updateScore(score);
    }

    public void updateScore(int newscore)
    {
        score += newscore;
        textField.text = score.ToString();
    }

}
