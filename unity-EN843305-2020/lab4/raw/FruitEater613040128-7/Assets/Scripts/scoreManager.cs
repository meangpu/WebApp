using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using TMPro;

public class scoreManager : MonoBehaviour
{
    public int score;
    public TextMeshProUGUI text_score;

    public void updateScore(){
        text_score.text = "score: " + score.ToString();
    }


}
